<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard//' ,
        'as' => 'dashboard.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        // Route::get('/test', function () {
        //     return view('dashboard.auth.password.email');
        // });
        #################################| Auth Dashboard |#################################
        Route::controller(AuthController::class)->group(function () {
            Route::get('login','showLoginForm')->name('login');
            Route::post('login/post','login')->name('login.post');
            Route::post('logout','logout')->name('logout');
            
        });
        #################################| Forgot Password |#################################
        Route::controller(ForgotPasswordController::class)->prefix('password/')->group(function(){
            Route::get('send/email','showForgotPasswordForm')->name('show.send.email');
            Route::post('send/code','sendCodeOtp')->name('send.code');
            Route::get('check/code/{email}','showFormCode')->name('show.form.code');
            Route::post('check/code','checkOtpCode')->name('check.code');
        });
        
        #################################| Reset Password |#################################
        Route::controller(ResetPasswordController::class)->group(function(){
            Route::get('reset/password/{email}/{token}','resetPassword')->name('show.reset.password');
            Route::post('reset/add/new/password','addNewPassword')->name('add.new.password');
        });


        #################################| Protected Routes Dashboard |#################################
        Route::group(['middleware' => 'auth:admin'],function () {

            #################################| Welcome Dashboard |#################################
            Route::get('welcome',[WelcomeController::class,'index'])->name('welcome');
            
            #################################| Roles Routes Dashboard |#################################
            Route::resource('roles',RoleController::class)->middleware('can:roles');
        });
        
    });
