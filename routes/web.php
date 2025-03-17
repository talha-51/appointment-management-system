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

Auth::routes();

//---------Dashboard---------//
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', 'AppointmentController@index')->name('dashboard');
    Route::get('logout', "DashboardController@logout")->name('logout');

    Route::resource('/appointment','AppointmentController');
    // Route::post('/appointment','AppointmentController@update')->name('appointment.update');
    Route::get('/appointment/displayAll','AppointmentController@show')->name('display');
});

Route::get('/', 'AppointmentController@publicCalander')->name('publicCalander');


// Route::get('/clearance/dashboard', 'AppointmentController@publicCalander')->name('publicCalander');
