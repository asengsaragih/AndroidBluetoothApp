<?php

use App\Http\Controllers\MatkulController;
use Illuminate\Http\Request;
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
        
        Route::get('matkul', 'MatkulController@index');
        Route::get('matkul/{id}', 'MatkulController@show');
        Route::post('matkul/{id}/update', 'MatkulController@update');
        Route::post('matkul/create', 'MatkulController@store');
        Route::delete('matkul/{id}/delete', 'MatkulController@destroy');
    });
    
    Route::group(['middleware' => ['role:dosen']], function () {
        
    });

});
