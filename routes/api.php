<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::group(['namespace' => 'Auth'], function () {
    Route::post('login',  [AuthController::class,'postLogin'])->name('auth.login');
    Route::post('registration', [AuthController::class,'create'])->name('auth.registration');
    Route::get('activate/{id}', [AuthController::class,'activate'])->name('auth.activate');
    Route::post('forget-password',[AuthController::class,'activate'])->name('forget.password');
    Route::get('/change-password-verification/{id}',[AuthController::class,'CheckCanUpdatePassword'])->name('forget.password_verification')->middleware('signed');
    Route::post('/change-password/{id}',[AuthController::class,'updatePassword'])->name('password.change');
});