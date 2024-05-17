<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lomba_ui;
use App\Models\AnggotaTim;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LombaUIController extends Controller
{
    public function index($namaTim){
        date_default_timezone_set("Asia/Jakarta");

        $tim_id = Auth::user()->id;
        if(Lomba_ui::where('tim_id',$tim_id)->exists()){
            $ada = true;
        }
        else{
            $ada=false;
        }
        $verified = Lomba_ui::where('tim_id',$tim_id)->first();
        if($verified){$verified = $verified->verified;}
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();

        if($jlhAnggota < 2 ){
            return view('dashboard',$namaTim);
        }

        if(date('Y-m-d') >= '2022-08-27' && date('Y-m-d') <= '2022-09-14' && $verified) { 
            // return view('client.submitUI',['namaTim'=>$namaTim]);
            return view('containers.clients.submit-ui',['namaTim'=>$namaTim]);
        }
        else if (date('Y-m-d') < '2022-09-14' && $verified) {
            // ak tambahin
            return view('containers.clients.end-ui',['namaTim'=>$namaTim]);
        }

        // return view('registLomba.ui_ux',[
        return view('containers.clients.regis-ui',[
            'namaTim' =>$namaTim,
            'tim_id'=>$tim_id,
            'daftar'=>$ada,
            'verified' =>$verified
        ]);
    }

    public function create(Request $request){
        $tim_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'bukti_bayar' => 'required|max:3000|image|mimes:jpeg,png,jpg,gif,svg,jfif',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $namaTim = User::where('id',$tim_id)->first()->namaTim;
        if(Lomba_ui::where('tim_id',$tim_id)->exists()){
            $file_name = Lomba_ui::where('tim_id',$tim_id)->first()->bukti_bayar;
            if(Storage::exists('public/bukti_ui/'.$file_name)){
                if(Storage::exists('public/bukti_ui/unverified_'.$namaTim.'.png')){
                    Storage::delete('public/bukti_ui/unverified_'.$namaTim.'.png');
                }
                Storage::move('public/bukti_ui/'.$file_name, 'public/bukti_ui/unverified_'.$namaTim.'.png');
            }
        }

        if(Lomba_ui::where('tim_id',$tim_id)->exists()){
            Lomba_ui::where('tim_id',$tim_id)->delete();
        }

        $bukti_bayar = Str::random(35).'.'.$request->bukti_bayar->extension();
        $request->bukti_bayar->storeAs('public/bukti_ui',$bukti_bayar);

        Lomba_ui::create([
            'tim_id'=>$tim_id,
            'bukti_bayar'=>$bukti_bayar,
            'verified'=>NULL
        ]);

        return redirect()->back();
    }

    public function submit(Request $request, $namaTim)
    {
        $request->validate(['submission'=>'required|url']);
        Lomba_ui::where('tim_id', Auth::user()->id)->update(['submission' => $request->submission]);

        return redirect()->back();
    }
}
