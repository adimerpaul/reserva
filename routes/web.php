<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reservae', 'HomeController@reservae')->name('reservae')->middleware('auth');
Route::get('/reservad', 'HomeController@reservam')->name('reservad')->middleware('auth');
Route::get('/reserva', 'HomeController@reserva')->name('reserva')->middleware('auth');
Route::get('/doctor', 'HomeController@doctor')->name('doctor')->middleware('auth');
Route::get('/especialidad', 'HomeController@especialidad')->name('doctor')->middleware('auth');


Route::apiResource('/reservation','ReservationController');
Route::apiResource('/doctors','DoctorController');
Route::apiResource('/specialtys','SpecialtyController');
Route::post('/specialtyUpdate/{specialty}','SpecialtyController@specialtyUpdate');
Route::post('/subir','DoctorController@subir');
Route::post('/actphoto','DoctorController@actphoto');
//Route::get('/subir','DoctorController@subir');
