<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LombaOlim;
use App\Models\AnggotaTim;
use App\Models\Soal;
use App\Models\Option;
use App\Models\Summary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LombaOlimController extends Controller
{
    public function index($namaTim){
        date_default_timezone_set("Asia/Jakarta");

        $tim_id = Auth::user()->id;
        if(LombaOlim::where('tim_id',$tim_id)->exists()){
            $ada = true;
        }
        else{
            $ada=false;
        }
        $verified = LombaOlim::where('tim_id',$tim_id)->first();
        if($verified){$verified = $verified->verified;}
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();

        if($jlhAnggota < 2 ){
            return view('dashboard',$namaTim);
        }

        if(date('Y-m-d') == "2022-09-03" && $verified) 
        {
            $attempt = LombaOlim::where('tim_id',$tim_id)->first();
            // $attempt = ($attempt->poin === null)? false : true;

            if($attempt->poin === null)
            {
                // return view('client.startOlym',['namaTim'=>$namaTim]);
                return view('containers.clients.start-olym',['namaTim'=>$namaTim]);
            }else
            {
                // return view('client.olimFinished',['namaTim'=>$namaTim]);
                return view('containers.clients.end-olym',['namaTim'=>$namaTim]);
            }
        }

        // return view('registLomba.olympiad',[
        return view('containers.clients.regis-olym',[
            'namaTim' =>$namaTim,
            'tim_id'=>$tim_id,
            'daftar'=>$ada,
            'verified' =>$verified
        ]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'bukti_bayar' => 'max:3000|image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tim_id = Auth::user()->id;
        $namaTim = User::where('id',$tim_id)->first()->namaTim;
        if(LombaOlim::where('tim_id',$tim_id)->exists()){
            $file_name = LombaOlim::where('tim_id',$tim_id)->first()->bukti_bayar;
            if(Storage::exists('public/bukti_olim/'.$file_name)){
                if(Storage::exists('public/bukti_olim/unverified_'.$namaTim.'.png')){
                    Storage::delete('public/bukti_olim/unverified_'.$namaTim.'.png');
                }
                Storage::move('public/bukti_olim/'.$file_name, 'public/bukti_olim/unverified_'.$namaTim.'.png');
            }
        }

        if(LombaOlim::where('tim_id',$tim_id)->exists()){
            LombaOlim::where('tim_id',$tim_id)->delete();
        }
        $bukti_bayar = Str::random(35).'.'.$request->bukti_bayar->extension();
        $request->bukti_bayar->storeAs('public/bukti_olim',$bukti_bayar);

        LombaOlim::create([
            'tim_id'=>$tim_id,
            'bukti_bayar'=>$bukti_bayar,
            'verified'=>NULL
        ]);
        return redirect()->back();
    }

    public function attempt($namaTim, $no)
    {
        $user = User::where('namaTim',$namaTim)->first();
        date_default_timezone_set("Asia/Jakarta");

        // Set start and end time in database with duration 100 minutes
        if(LombaOlim::where('tim_id',$user->id)->first()->end_time == null)
        {
            LombaOlim::where('tim_id',$user->id)->update(['start_time'=>date('H:i:s'), 'end_time'=>date('H:i:s',strtotime("+100 Minutes"))]);
            // LombaOlim::where('tim_id',$user->id)->update(['start_time'=>date('H:i:s'), 'end_time'=>date('H:i:s',strtotime("+20 Seconds"))]);
        }

        $participant_olym = LombaOlim::where('tim_id',$user->id)->first();
        if($participant_olym->poin !== null)
        {
            return redirect()->route('lomba.olim',['namaTim'=>$namaTim]);
        }
        if(Summary::where('tim_id',$user->id)->count() == 0)
        {
            $questions = Soal::inRandomOrder()->limit(50)->get();
            foreach($questions as $question)
            {
                Summary::create([
                    'soal_id' => $question->id,
                    'tim_id' => $user->id
                ]);
            }
        }

        $summaries = Summary::where('tim_id',$user->id)->get();
        if($no > $summaries->count())
        {
            abort(404);
        }
        $question = Soal::where('id',$summaries[$no-1]->soal_id)->first();
        $attempt = Summary::where([
            'tim_id'=>$user->id,
            'soal_id'=>$question->id
        ])->first();
        $options = Option::where('soal_id',$question->id)->get();

        // Search time left
        $now = strtotime(date("H:i:s"));
        $end_time = strtotime(LombaOlim::where('tim_id',Auth::user()->id)->first()->end_time);
        $duration = $end_time - $now;

        // finish
        if($duration <= 0)
        {
            $summaries = Summary::where('tim_id',Auth::user()->id)->get();
            $correct_answer = 4 * ($summaries->where('answer_status',"===",1)->count());
            $false_answer = 2 * ($summaries->where('answer_status','===',0)->count());
            $score = $correct_answer - $false_answer;

            LombaOlim::where('tim_id',Auth::user()->id)->update(['poin' => $score, 'duration'=>100]);

            return redirect()->route('lomba.olim',['namaTim'=>$namaTim]);
        }

        // return view('client.attempt',[
        return view('containers.clients.attempt',[
            'attempt'=>$attempt,
            'no' => $no,
            'total_question' => $summaries->count(),
            'namaTim' => $namaTim,
            'question' => $question,
            'summaries' => $summaries,
            'options' => $options,
            'duration' => $duration,
            'end_time' => $end_time
        ]);
    }

    public function answer(Request $request, $namaTim, $no)
    {
        date_default_timezone_set("Asia/Jakarta");

        $user = User::where('namaTim',$namaTim)->first();
        $participant_olym = LombaOlim::where('tim_id',$user->id)->first();
        // $participant_olym = LombaOlim::where('tim_id',Auth::user()->id);
        if($participant_olym->poin !== null)
        // if(!$participant_olym->poin)
        {
            return redirect()->route('lomba.olim',['namaTim'=>$namaTim]);
        }

        $flag_status = Summary::where('soal_id',$request->soal_id)->get()->first()->flag;
        if($request->flag && !$flag_status)
        {
            Summary::where([
                'soal_id'=>$request->soal_id,
                'tim_id'=>Auth::user()->id
                ])->update(['flag'=>true]);
        } else if($request->flag==null && $flag_status)
        {
            Summary::where([
                'soal_id'=>$request->soal_id,
                'tim_id'=>Auth::user()->id
                ])->update(['flag'=>false]);
        }

        if($request->option_id != null)
        {
            $option = Option::where('id',$request->option_id)->first();
            if($option->benar)
            {
                Summary::where([
                        'soal_id'=>$request->soal_id,
                        'tim_id'=>Auth::user()->id
                    ])->update(['option_id'=>$request->option_id,'answer_status'=>true]);
            } else
            {
                Summary::where([
                    'soal_id'=>$request->soal_id,
                    'tim_id'=>Auth::user()->id
                ])->update(['option_id'=>$request->option_id,'answer_status'=>false]);
            }
        }else{
            Summary::where([
                'soal_id'=>$request->soal_id,
                'tim_id'=>Auth::user()->id
            ])->update(['option_id'=>NULL,'answer_status'=>NULL]);
        }

        if($request->action == "selesai")
        {
            $summaries = Summary::where('tim_id',Auth::user()->id)->get();
            $correct_answer = 4 * ($summaries->where('answer_status',true)->count());
            $false_answer = 2 * ($summaries->where('answer_status', false)->count());
            $not_answered = 2 * ($summaries->where('answer_status','===',NULL)->count());
            $false_answer = $false_answer - $not_answered;
            $score = $correct_answer - $false_answer;

            // Durasi
            LombaOlim::where('tim_id',Auth::user()->id)->update(['poin' => $score, 'duration'=>(integer)((strtotime(date("H:i:s"))-strtotime(LombaOlim::where("tim_id",Auth::user()->id)->first()->start_time))/60)]);

            return redirect()->route('lomba.olim',['namaTim'=>$namaTim]);

        }

        if($request->action == "next")
        {
            return redirect()->route('attempt',['namaTim'=>$namaTim,'no'=>($no+1)]);
        } else if($request->action == "previous")
        {
            return redirect()->route('attempt',['namaTim'=>$namaTim,'no'=>($no-1)]);
        } else if(preg_match("/moveTo/",$request->action)) {
            return redirect()->route('attempt',['namaTim'=>$namaTim,'no'=>explode("-",$request->action)[1]]);
        } else {
            abort(404);
        }

    }
}
