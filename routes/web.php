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

Route::get('/',[\App\Http\Controllers\ChargeController::class,'index']);

Route::any('/charge',[\App\Http\Controllers\ChargeController::class,'charge']);

Route::get('/razorpay',[\App\Http\Controllers\RazorpayController::class,'razorPay']);
Route::any('/payment', [\App\Http\Controllers\RazorpayController::class,'payment'])->name('payment');

Route::get('/wordline',[\App\Http\Controllers\WordLineController::class,"index"]);
Route::post('/wordpos', [\App\Http\Controllers\WordLineController::class,"ProsesarPagos"])->name("paymentwordpos");

Route::get('/addonpay',[\App\Http\Controllers\AddonPayController::class,"index"]);
Route::post('/addonpayPost',[\App\Http\Controllers\AddonPayController::class,'prosesar'])->name("prosesar");

Route::get('/securionpay',[\App\Http\Controllers\WordLineController::class,'securionpay']);
Route::post('/postsecurionpay',[\App\Http\Controllers\WordLineController::class,'Postsecurionpay'])->name("paymentsecurionpay");
