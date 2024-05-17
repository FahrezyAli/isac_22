<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@landing')->name('landing');

// Route::get('/register','AuthController@regist')->name('regist');
// Route::post('/register','AuthController@create')->name('auth.regist');

Route::get('/login', 'AuthController@index')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@login')->name('auth.login');

Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('auth.logout');

Route::group(['prefix'=>'{namaTim}', 'middleware'=>'user_check'],function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/addAnggota', 'DashboardController@show_form')->name('form.addAnggota');
    Route::post('/addAnggota', 'DashboardController@addAnggota')->name('form.addAnggota');

    Route::get('/sertifikat', 'DashboardController@show_sertif')->name('sertif');
    // Route::post('/dashboard', 'DashboardController@add_sertif')->name('add.sertif');
    Route::get('/sertifikat/{id}', 'DashboardController@download_sertif')->name('download.sertif');

    Route::get('/ui.ux', 'LombaUIController@index')->name('lomba.ui');
    Route::post('/ui.ux','LombaUIController@create')->name('registA');
    Route::put('/ui.ux', 'LombaUIController@submit')->name('submitA');

    Route::get('/olympiad', 'LombaOlimController@index')->name('lomba.olim');
    Route::post('/olympiad','LombaOlimController@create')->name('registB');
    Route::get('/olympiad/question+number+{no}','LombaOlimController@attempt')->name('attempt');
    Route::put('/olympiad/question+number+{no}','LombaOlimController@answer')->name('answer');

});

//admin
Route::get('/admin/login', 'AuthController@loginAdmin')->name('loginAdmin');
Route::post('/admin/login', 'AuthController@login')->name('auth.admin')->middleware('isAdmin');

Route::group(['prefix'=>'/admin','middleware'=>'auth_admin'],function(){
    Route::get('/', 'DashboardController@admin_home')->name('dashboard.admin');

    Route::group(['prefix'=>'/soal-olim'],function(){
        Route::get('/', 'SoalOlimController@index')->name('soal_olim');

        Route::get('/add-soal', 'SoalOlimController@add')->name('add-soal');
        Route::post('/add-soal','SoalOlimController@create')->name('create-soal');

        // Route::get('/{id}','SoalOlimController@detail')->name('detail-soal');
        
        Route::get('/{id}/edit','SoalOlimController@editSoal')->name('edit-soal');
        Route::put('/{id}/edit','SoalOlimController@updateSoal')->name('update-soal');
        Route::delete('/{id}/delete','SoalOlimController@deleteSoal')->name('delete-soal');

    });


    Route::get('/tim', 'DashboardController@peserta')->name('peserta');
    Route::get('/tim/{id}', 'DashboardController@detail_peserta')->name('detail_peserta');
    Route::put('/tim/{id}', 'DashboardController@sertifikat')->name('upload_sertif');
    Route::put('/tim/{id}/delSertif', 'DashboardController@sertif_delete')->name('delete_sertif');

    Route::get('/verifikasi', 'AutentikasiController@index')->name('autentikasi.admin');
    Route::put('/verifikasi/lomba_olim/{id}','AutentikasiController@verify_olim')->name('lomba_olim.verify');
    Route::put('/verifikasi/lomba_ui/{id}','AutentikasiController@verify_ui')->name('lomba_ui.verify');

    // Route::get('/lomba_ui', 'LombaUIController@lomba_ui')->name('lomba_ui.admin');
    // Route::put('/lomba_ui/{id}', 'LombaUIController@verify_bukti')->name('lomba_ui.verify');

    // Route::get('/lomba_olim', 'LombaOlimController@lomba_olim')->name('lomba_olim.admin');
    // Route::put('/lomba_olim/{id}', 'LombaOlimController@verify_bukti')->name('lomba_olim.verify');

});

