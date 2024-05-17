<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Summary;
use App\Models\Lomba_ui;
use App\Models\LombaOlim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    // Untuk ADMIN
    public function index(){
        // return view('dashboard.autentikasi.index',[
        $teams = User::where('admin', 0)->get();
        foreach($teams as $team){
            $summaries = Summary::where('tim_id',$team->id)->get();
            $correct_answer = 4 * ($summaries->where('answer_status',true)->count());
            $false_answer = 2 * ($summaries->where('answer_status', false)->count());
            $not_answered = 2 * ($summaries->where('answer_status','===',NULL)->count());
            $false_answer = $false_answer - $not_answered;
            $score = $correct_answer - $false_answer;

            // Durasi
            LombaOlim::where('tim_id',$team->id)->update(['poin' => $score]);
        }
        return view('containers.admin.list-verif',[
            'teams' => $teams
        ]);
    }

    public function verify_olim(Request $request){
        LombaOlim::where('id', $request->id)->update([
            'verified' => $request->verify
        ]);
        return redirect()->back();
    }

    public function verify_ui(Request $request){
        Lomba_ui::where('id', $request->id)->update([
            'verified' => $request->verify
        ]);
        return redirect()->back();
    }
}
