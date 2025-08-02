<?php

use Livewire\Livewire;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Website\BrandController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\UserProfileController;
use App\Http\Controllers\Website\wishlistController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::get('/', [HomeController::class, 'index'])->name('home');

        #################################| Auth Dashboard |#################################
        Route::controller(LoginController::class)->group(function () {
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
        });
        #################################| Register Dashboard |#################################
        Route::controller(RegisterController::class)->group(function () {
            Route::get('register', 'showRegistrationForm')->name('register');
            Route::post('register', 'register')->name('register');
        });
        #################################| Forgot Password |#################################
        Route::controller(ForgotPasswordController::class)->prefix('password/')->group(function () {
            Route::get('send/email', 'showConfirmForm')->name('show.send.email');
            Route::post('send/code', 'sendCodeOtp')->name('send.code');
            Route::get('check/code/{email}', 'showFormCode')->name('show.form.code');
            Route::post('check/code', 'checkOtpCode')->name('check.code');
        });

        #################################| Reset Password |#################################
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('reset/password/{email}/{token}', 'resetPassword')->name('show.reset.password');
            Route::post('reset/add/new/password', 'addNewPassword')->name('add.new.password');
        });
        
      
        ############################| Page |######################################
        Route::get('page/{slug}',[PageController::class, 'showPage'])->name('page');
        
        ############################| FAQ |######################################
        Route::get('faqs', [FaqController::class, 'ShowFaqPage'])->name('faqs.index');
        
        ############################| Category |######################################
        Route::controller(CategoryController::class)->name('category.')->group(function () {
            Route::get('categories', 'index')->name('index');
            Route::get('category/{slug}/products', 'getProductsByCategory')->name('products');
        });
        
        ############################| Brand |######################################
        Route::controller(BrandController::class)->name('brand.')->group(function () {
            Route::get('brands', 'index')->name('index');
            Route::get('brand/{slug}/products', 'getProductsByBrand')->name('products');
        });
        
        ############################| Product |######################################
        Route::controller(ProductController::class)->prefix('products/')->as('products.')->group(function () {
            Route::get('shop', 'allProducts')->name('shop');
            Route::get('show/{slug}', 'showProductPage')->name('show');
            Route::get('{type}', 'getProductsByType')->name('by.type');
            Route::get('{slug}/related-products', 'relatedProduct')->name('related');

        });

          Route::group(['middleware' => ['verified', 'auth:web']], function () {

            #############################| User Profile |############################
            Route::controller(UserProfileController::class)->group(function () {
                Route::get('/profile', 'index')->name('profile');
            });
            ############################| Wishlist |######################################
            Route::get('wishlist',wishlistController::class)->name('wishlist.index');
        });

        Auth::routes(['verify' => true]);
        #livewire
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
    }
);
 Route::get('email/verify', [VerificationController::class,'show'])->name('verification.notice');
 Route::get('email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
 Route::post('email/resend', [VerificationController::class,'resend'])->name('verification.resend');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
