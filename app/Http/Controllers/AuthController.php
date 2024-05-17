<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AnggotaTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        // return view('auth.login');
        return view('containers.clients.login');
    }

    public function landing(){
        // if (Auth::user()){
        //     return view('home_logged',[
        //         'namaTim' => Auth::user()->namaTim
        //     ]);
        // }
        // else{
            return view('containers.clients.landing');
        // }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaTim'=> 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('namaTim', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();

            if(auth()->user()->admin) {
                return redirect()->route('dashboard.admin');
            }else{
                $namaTim = Auth::user()->namaTim;
                return redirect()->route('dashboard',$namaTim);
            }
        }else{
            Session::flash('error','Login Gagal!!');
            return redirect()->back()->withInput();
        }

    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login');
    // }

    // public function regist(){
    //     $dict_provinsi = ApiController::call();
    //     return view('auth.register',[
    //         "listProv" => $dict_provinsi
    //     ]);
    // }

    public function logout()
    {
        if (Auth::user()->admin) {
            Auth::logout();
            return redirect()->route('loginAdmin');
        }
        Auth::logout();
        return redirect()->route('landing');
    }

    public function regist(){
        $dict_provinsi = ApiController::call();
        // return view('auth.register',[
        return view('containers.clients.registrasi',[
            "listProv" => $dict_provinsi
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaTim'    => 'required|unique:users,namaTim',
            'email' => 'required|email|unique:users,emailTim',
            'password' => 'required',
            'provinsiSekolah' => 'required',
            'kotaSekolah' => 'required',
            'asalSekolah' => 'required',
        ],
        [
            'namaTim.unique'=>'Nama Tim sudah diambil orang',
            'email.unique'=>'Email Tim sudah diambil orang',
        ]
        );

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'namaTim' => $request->namaTim,
            'emailTim' => $request->email,
            'password' => Hash::make($request->password),
            'asalSekolah' => $request->asalSekolah,
            'kotaSekolah' => $request->kotaSekolah,
            'provinsiSekolah' => $request->provinsiSekolah
        ]);

        return redirect()->route('login')->with('username',$request->namaTim);
    }


    public function loginAdmin()
    {
        // return view('auth.admin_login');
        return view('containers.admin.login');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
