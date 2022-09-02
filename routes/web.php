<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () { return view('frontend.homepage'); })->name('home');
Route::get('/sorry', function () { return view('frontend.sorry'); })->name('sorry');

Auth::routes();

// Register
Route::get('/register', 'App\Http\Controllers\AuthController@registerPage')->name('register.view');
Route::get('/register/employer', function(){return view('backend/auth/employer_register');});
Route::get('/register/employee', function(){return view('backend/auth/employee_register');});
Route::post('/auth/register', 'App\Http\Controllers\AuthController@register')->name('register');

// OTP Verification
Route::get('/auth/verify', 'App\Http\Controllers\AuthController@verify')->name('verify');
Route::post('/auth/verification', 'App\Http\Controllers\AuthController@verification')->name('verification');
Route::get('/otp/resend/{phone}', 'App\Http\Controllers\AuthController@resendOtp')->name('otp.resend');

// Login
Route::post('/auth/login', 'App\Http\Controllers\AuthController@authenticate')->name('authenticate');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');

// Password Reset
Route::get('/forgot-password', 'App\Http\Controllers\AuthController@forgotPassword')->name('forgot-password');
Route::post('/reset-verification', 'App\Http\Controllers\AuthController@sendResetVarificationCode')->name('reset-verification');
Route::get('/reset-password', 'App\Http\Controllers\AuthController@resetPassword')->name('reset-password');
Route::post('/set-new-password', 'App\Http\Controllers\AuthController@setNewPassword')->name('set-new-password');


Route::group(['middleware' => 'auth'],  function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Employee
    Route::post('/employee/application', [EmployeeController::class, 'store'])->name('employee.apply');

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'],  function(){
        Route::resource('roles', RolesController::class, ['name' => 'roles']);
        Route::resource('users', UsersController::class, ['name' => 'users']);

        Route::get('/employee/list', [EmployeeController::class, 'index'])->name('employee.list');
        Route::get('/employee/{id}/details', [EmployeeController::class, 'viewDetails'])->name('employee.view');
        Route::get('/employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });
});