<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestLanguageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        // Route::get('/', function () {
        //     return view('dashboard.welcome');
        // });
        // Route::get('test/language',[TestLanguageController::class,'index'])->name('test.language');
        // Route::post('test/language/store',[TestLanguageController::class,'store'])->name('test.language.store');
        // Route::get('test/language/edit{id}',[TestLanguageController::class,'edit'])->name('test.language.edit');
    });
