<?php

use App\Http\Controllers\MatkulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'api\AuthController@login');
Route::post('register', 'api\AuthController@register');

Route::group(['middleware' => ['auth:api']], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('mahasiswa', 'JadwalMahasiswaController@getAllMahasiswaWithJadwalAndDosen');
        Route::get('jadwal', 'JadwalMahasiswaController@getAllJadwalWithDosen');
        
        //matkul configure
        Route::get('matkul', 'MatkulController@index');
        Route::get('matkul/{id}', 'MatkulController@show');
        Route::post('matkul/{id}/update', 'MatkulController@update');
        Route::post('matkul/create', 'MatkulController@store');
        Route::delete('matkul/{id}/delete', 'MatkulController@destroy');

        //mahasiswa matkul configure
        Route::post('mahasiswa/jadwal/create', 'MahasiswaMatkulController@create');
        Route::post('mahasiswa/jadwal/update/{id_mahasiswa}/{id_matkul}/{id_dosen}', 'MahasiswaMatkulController@update');
        Route::post('mahasiswa/jadwal/delete/{id_mahasiswa}/{id_matkul}/{id_dosen}', 'MahasiswaMatkulController@delete');
    });
    
    Route::group(['middleware' => ['role:dosen']], function () {
        Route::get('dosen/mahasiswa', 'DosenController@getAllMahasiswaWithJadwal');
        Route::get('dosen/matkul', 'DosenController@getAllMatkul');
    });

});
