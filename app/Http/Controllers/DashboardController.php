<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lomba_ui;
use App\Models\LombaOlim;
use App\Models\AnggotaTim;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index($namaTim){
        $team = Auth::user();
        $tim_id = Auth::user()->id;
        $anggota = AnggotaTim::where('tim_id',$tim_id)->get();
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();
        $ketua = AnggotaTim::where('tim_id',$tim_id)->where('ketua',true)->count();
        $adaKetua = false;

        if($jlhAnggota == 2){    
            foreach($team->tim as $member){
                if($member->ketua){
                    $adaKetua = true;
                }
            }
        }

        if(auth()->user()->admin) {
            return redirect()->route('dashboard.admin');
        }elseif($jlhAnggota<2 && $adaKetua==false){
               return redirect()->route('form.addAnggota',$namaTim)->with('info', 'Lengkapi biodata terlebih dahulu.');
        }else{
            // return view('dashboard',[
            return view('containers.clients.dashboard',[
                'namaTim' =>$namaTim,
                'jlhAnggota' =>$jlhAnggota,
                'anggota'=>$anggota,
                'ketua'=>$ketua,
                'adaKetua' =>$adaKetua,
            ]);
        }
        
    }

    public function show_form($namaTim){
        $team = Auth::user();
        $tim_id = Auth::user()->id;
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();
        $ketua = AnggotaTim::where('tim_id',$tim_id)->where('ketua',true)->count();
        $adaKetua = false;
        if($jlhAnggota == 2){    
            foreach($team->tim as $member){
                if($member->ketua){
                    $adaKetua = true;
                }
            }
        }

        // return view('form_anggota',[
        return view('containers.clients.add-anggota',[
            'jlhAnggota'=>$jlhAnggota,
            'namaTim' =>$namaTim,
            'ketua'=>$ketua,
            'adaKetua' =>$adaKetua,
        ]);
    }

    public function addAnggota(Request $request){
        // Cek input requests
        $validator = Validator::make($request->all(), [
            'bukti_siswa' => 'required|max:3000|image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'pas_foto' => 'required|max:3000|image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'nama' => 'required',
            'tanggal_lahir' => 'required|before:today',
            'no_whatsapp' => 'required|digits_between:11,14',
        ],[
            'tanggal_lahir.before' => ':attribute harus sebelum hari ini.'
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tim_id = Auth::user()->id;
        $tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        
        $pas_foto = Str::random(35).'.'.$request->pas_foto->extension();
        $request->pas_foto->storeAs('public/pas_foto',$pas_foto);
        
        $bukti_siswa = Str::random(35).'.'.$request->bukti_siswa->extension();
        $request->bukti_siswa->storeAs('public/bukti_siswa',$bukti_siswa);

        if($request->status){
            $status=$request->status;
        }
        else{
            $status=false;
        }

        AnggotaTim::create([
            'nama' => $request->nama,
            'tim_id' => $tim_id,
            'tanggal_lahir' => $tanggal_lahir,
            'ketua' => $status,
            'no_wa' => $request->no_whatsapp,
            'buktiSiswa' => $bukti_siswa,
            'pas_foto' => $pas_foto
        ]);

        $namaTim = User::where('id',$tim_id)->first()->namaTim;
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();

        if($jlhAnggota < 3){
            return redirect()->route('form.addAnggota',$namaTim)->with('info', 'Tambahkan anggota ke-' . ($jlhAnggota + 1));
        }
        else{
            return redirect()->route('dashboard',$namaTim);
        }
    }

    public function show_sertif($namaTim){
        $tim_id = Auth::user()->id;
        $anggota = AnggotaTim::where('tim_id',$tim_id)->get();
        $jlhAnggota = AnggotaTim::where('tim_id',$tim_id)->count();
        if($jlhAnggota < 2 ){
            return view('dashboard',$namaTim);
        }
        return view('containers.clients.dashboard-sertif',[
            'anggota'=>$anggota,
            'tim_id' =>$tim_id,
            'namaTim' =>$namaTim,
        ]);
    }

    public function download_sertif($namaTim,$id){
        $tim_id = Auth::user()->id;
        $anggota = AnggotaTim::where('id',$id)->first();
        $file = 'public/sertifikat/'.$anggota->sertifikat;
        
        return Storage::download($file, 'Sertifikat ISAC 2022'.'_'.$anggota->nama.'.pdf');
    }
    

    // DASHBOARD ADMIN
    public function peserta()
    {
        // return view('dashboard.list_peserta.index', [
        return view('containers.admin.list-tim', [
            'teams' => User::where('admin', 0)->get()
        ]);
    }

    public function detail_peserta($id)
    {
        // return view('dashboard.list_peserta.detail', [
        return view('containers.admin.detail-tim', [
            'team' => User::all()->find($id),
            'anggota' => AnggotaTim::all(),

        ]);
    }

    public function sertifikat(Request $request)
    {
        $a = AnggotaTim::where('id', $request->id)->first();
        
        $validatedData = $request->validate([
            'sertifikat' => 'file|max:10240'
        ]);

        if($request->file('sertifikat')) {
            if($request->oldFile) {
                Storage::delete('public/sertifikat/'.$request->oldFile);
            }

            $sertifikat = Str::random(35).'.'.$request->sertifikat->extension();
            $request->sertifikat->storeAs('public/sertifikat',$sertifikat);
        }

        $a->sertifikat = $sertifikat;
        $a->save();

        return redirect()->back()->with('success',"Sertifikat berhasil diupload");

    }

    public function sertif_delete($id){
        $a = AnggotaTim::where('id', $id)->first();
        Storage::delete('public/sertifikat/'.$a->sertifikat);
        $a->sertifikat=null;
        $a->save();

        return redirect()->back()->with('success', 'Berhasil menghapus sertifikat.');
    }

    public function admin_home()
    {
        $jlh_tim = User::where('admin', false)->count();
        $jlh_olim = LombaOlim::count();
        $jlh_olim_verif = LombaOlim::where('verified',true)->count();
        $jlh_ui = Lomba_ui::count();
        $jlh_ui_verif = Lomba_ui::where('verified',true)->count();
        $jlh_peserta = AnggotaTim::count();

        // return view('dashboard.index',[
        return view('containers.admin.dashboard',[
            'jlh_tim'=>$jlh_tim,
            'olim'=>$jlh_olim,
            'olim_verif'=>$jlh_olim_verif,
            'ui'=>$jlh_ui,
            'ui_verif'=>$jlh_ui_verif,
            'jlh_peserta'=>$jlh_peserta,
        ]);
    }
}
