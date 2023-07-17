<?php

use App\Http\Controllers\StripeController;
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
Route::post('/checkout',[StripeController::class,'payment'])->name('checkout');
Route::get('/checkout/success',[StripeController::class,'success'])->name('checkout.success');
Route::get('/checkout/cancel',[StripeController::class,'cancel'])->name('checkout.cancel');
