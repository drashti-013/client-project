<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::view( '/login','login')->name('login');

Route::view( '/','index')->name('index');

Route::view('/dashboard','dashboard')->name('dashboard');

Route::resource('client',ClientController::class);

Route::post('/login_check',[LoginController::class,'login']);

Route::view('/client_service','client_service')->name('client_service');

Route::view('/add_address','add_address')->name('address');

Route::resource('address',AddressController::class);

Route::post('/chnage_passsword',[ClientController::class,'change_password'])->name('client.change_password');


