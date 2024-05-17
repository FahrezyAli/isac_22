<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SoalOlimController extends Controller
{
    public function index()
    {
        $soals = Soal::paginate(10);
        // return view('admin.soal-olim', [
        return view('containers.admin.list-soal', [
            'soals' => $soals
        ]);
    }

    public function add()
    {
        // return view('admin.add-soal');
        return view('containers.admin.add-soal');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal',
            'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_1' => 'required',
            'gambar_1' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_2' => 'required',
            'gambar_2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_3' => 'required',
            'gambar_3' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_4' => 'required',
            'gambar_4' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_5' => 'required',
            'gambar_5' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'benar' => 'required'
        ], [
            'benar.required' => 'Pilihan yang benar wajib diisi'
        ]);
        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $gambar_soal = null; 
        if ($request->gambar_soal) {
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        Soal::create([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
            'jawaban' => $request->benar
        ]);

        $id_soal = Soal::latest()->first()->id;

        for ($i = 0; $i <= 4; $i++) {
            $option = 'option_';
            $gambar = 'gambar_';
            $gambar .= strval($i + 1);
            $option .= strval($i + 1);
            $gambar_option = $request->$gambar;
            if ($request->$gambar) {
                $gambar_option = Str::random(35) . '.' . $request->$gambar->extension();
                $request->$gambar->storeAs('public/gambar_option', $gambar_option);
            }
            if ($i + 1 == $request->benar) {
                Option::create([
                    'soal_id' => $id_soal,
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option,
                    'benar' => true
                ]);
            } else {
                Option::create([
                    'soal_id' => $id_soal,
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option
                ]);
            }
        }

        return redirect()->route('soal_olim');
    }

    // public function detail($soal_id){
    //     $soal = Soal::where('id', $soal_id)->first();
    //     $options = $soal->options;
    //     return view('admin.detail-soal',[
    //         'soal'=>$soal,
    //         'options'=>$options
    //     ]);
    // }

    public function editSoal($soal_id){
        $soal = Soal::where('id', $soal_id)->first();
        $options = $soal->options;
        // return view('admin.edit-soal',[
        return view('containers.admin.edit-soal',[
            'soal'=>$soal,
            'options'=>$options
        ]);
    }


    public function updateSoal($soal_id, Request $request){
        $soal = Soal::where('id', $soal_id)->first();
        $options = $soal->options;
        if($soal->soal == $request->soal){
            $soal->update(['soal'=>'a']);
            $soal->save();
        }
        $validator = Validator::make($request->all(), [
            'soal' => 'required|unique:soals,soal', 'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_1' => 'required', 'gambar_1' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_2' => 'required', 'gambar_2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_3' => 'required', 'gambar_3' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_4' => 'required', 'gambar_4' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'option_5' => 'required', 'gambar_5' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'benar' => 'required'
        ]);
        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gambar_soal = $soal->gambar_soal; 
        if ($request->gambar_soal) {
            Storage::delete('public/gambar_soal/'.$gambar_soal);
            $gambar_soal = Str::random(35) . '.' . $request->gambar_soal->extension();
            $request->gambar_soal->storeAs('public/gambar_soal', $gambar_soal);
        }

        $soal->update([
            'soal' => $request->soal,
            'gambar_soal' => $gambar_soal,
            'jawaban' => $request->benar
        ]);
        $soal->save();

        $i = 1;
        foreach($options as $opsi){
            $option = 'option_';
            $gambar = 'gambar_';            
            $gambar .= strval($i);
            $option .= strval($i);
            $gambar_option = $opsi->gambar_option;
            
            if ($request->$gambar) {
                Storage::delete('public/gambar_option/'.$gambar_option);
                $gambar_option = Str::random(35) . '.' . $request->$gambar->extension();
                $request->$gambar->storeAs('public/gambar_option', $gambar_option);   
            }

            if ($i == $request->benar) {
                $opsi->update([
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option,
                    'benar' => true
                ]);
            } else {
                $opsi->update([
                    'isi_option' => $request->$option,
                    'gambar_option' => $gambar_option
                ]);
            }
            $opsi->save();
            $i++;
        }

        return redirect()->route('soal_olim');
    }
    
    
    public function deleteSoal($soal_id){
        $soal = Soal::where('id', $soal_id)->first();
        $options = $soal->options;
        foreach ($options as $option){
            Storage::delete('public/gambar_option/'.$option->gambar_option);
            $option->delete();
        }
        Storage::delete('public/gambar_soal/'.$soal->gambar_soal);
        $soal->delete();
        return redirect()->back();
    }
}


