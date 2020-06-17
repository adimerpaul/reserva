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
Route::get('/reservae', 'HomeController@reservae')->name('reservae');
Route::get('/reservad', 'HomeController@reservam')->name('reservad')->middleware('auth');
Route::get('/reserva', 'HomeController@reserva')->name('reserva')->middleware('auth');
Route::get('/doctor', 'HomeController@doctor')->name('doctor')->middleware('auth');
Route::get('/especialidad', 'HomeController@especialidad')->name('doctor')->middleware('auth');
Route::apiResource('/reservation','ReservationController');
Route::apiResource('/doctors','DoctorController')->middleware('auth');
Route::apiResource('/specialtys','SpecialtyController');
Route::post('/specialtyUpdate/{specialty}','SpecialtyController@specialtyUpdate')->middleware('auth');
Route::post('/subir','DoctorController@subir')->middleware('auth');
Route::post('/actphoto','DoctorController@actphoto')->middleware('auth');
Route::post('/preguntareservas','ReservationController@buscar')->middleware('auth');
Route::put('/liberar/{reservation} ','ReservationController@liberar')->middleware('auth');
Route::put('/ocupar/{reservation} ','ReservationController@ocupar')->middleware('auth');
Route::post('/preguntauser','ReservationController@pregunta');
//Route::get('/subir','DoctorController@subir');
