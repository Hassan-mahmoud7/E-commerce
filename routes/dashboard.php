<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\WorldController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard//',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        // Route::get('/test', function () {
        //     return view('dashboard.auth.password.email');
        // });
        #################################| Auth Dashboard |#################################
        Route::controller(AuthController::class)->group(function () {
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login/post', 'login')->name('login.post');
            Route::post('logout', 'logout')->name('logout');
        });
        #################################| Forgot Password |#################################
        Route::controller(ForgotPasswordController::class)->prefix('password/')->group(function () {
            Route::get('send/email', 'showForgotPasswordForm')->name('show.send.email');
            Route::post('send/code', 'sendCodeOtp')->name('send.code');
            Route::get('check/code/{email}', 'showFormCode')->name('show.form.code');
            Route::post('check/code', 'checkOtpCode')->name('check.code');
        });

        #################################| Reset Password |#################################
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('reset/password/{email}/{token}', 'resetPassword')->name('show.reset.password');
            Route::post('reset/add/new/password', 'addNewPassword')->name('add.new.password');
        });


        #################################| Protected Routes Dashboard |#################################
        Route::group(['middleware' => 'auth:admin'], function () {

            #################################| Welcome Dashboard |#################################
            Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');

            #################################| Roles Routes Dashboard |#################################
            Route::resource('roles', RoleController::class)->middleware('can:roles');

            #################################| Admins Routes Dashboard |#################################
            Route::group(['middleware' => 'can:admins'], function () {
                Route::resource('admins', AdminController::class);
                Route::get('admins/{id}/status', [AdminController::class, 'ChangeStatus'])->name('admins.status');
            });

            #################################| Shipping & Countries & Cities Routes Dashboard |#################################
            Route::controller(WorldController::class)->middleware('can:global_shipping')->group(function () {
                # country
                Route::prefix('countries')->name('countries')->group(function () {
                    Route::get('/', 'getAllCountries');
                    Route::get('/status/{country_id}', 'changeStatusCountry')->name('.status');
                });
                # governorate
                Route::prefix('governorates/')->name('governorates')->group(function () {
                    Route::get('', 'getAllGovernorates');
                    Route::get('{country_id}', 'getAllGovernorates')->name('.by.country');
                    Route::get('status/{governorate_id}', 'changeStatusGovernorate')->name('.status');
                    Route::put('shipping/price', 'changeShippingPrice')->name('.shipping.price');
                });
                # city
                Route::prefix('cities')->name('cities')->group(function () {
                    Route::get('/', 'getAllCities');
                    Route::get('/{governorate_id}', 'getAllCities')->name('.by.governorate');
                    Route::get('/status/{city_id}', 'changeStatusCity')->name('.status');
                });
            });

            #################################| Categories Routes Dashboard |#################################
            Route::group(['middleware' => 'can:categories'], function () {
                Route::resource('categories', CategoryController::class)->except('show');
                Route::get('categories-all', [CategoryController::class, 'getAllCategoriesForDatatable'])->name('categories.all');
                Route::get('categories/status/{id}', [CategoryController::class, 'ChangeStatus'])->name('categories.status');
            });
            #################################| Brands Routes Dashboard |#################################
            Route::group(['middleware' => 'can:brands'], function () {
                Route::resource('brands', BrandController::class);
                Route::get('brands-all', [BrandController::class, 'getAllBrandsForDatatable'])->name('brands.all');
                Route::get('brands/{id}/status', [BrandController::class, 'changeStatus'])->name('brands.status');
            });
            #################################| Coupons Routes Dashboard |#################################
            Route::group(['middleware' => 'can:coupons'], function () {
                Route::resource('coupons', CouponController::class);
                Route::get('coupons-all', [CouponController::class, 'getAllCouponsForDatatable'])->name('coupons.all');
                Route::get('coupons/{id}/status', [CouponController::class, 'ChangeStatus'])->name('coupons.status');
            });
            #################################| Faqs Routes Dashboard |#################################
            Route::group(['middleware' => 'can:faqs'], function () {
                Route::resource('faqs', FaqController::class);
            });
            #################################| Settings Routes Dashboard |#################################
            Route::group(['middleware' => 'can:settings'], function () {
                Route::get('settings', [SettingController::class, 'index'])->name('settings');
                Route::put('settings/update/{id}', [SettingController::class, 'update'])->name('settings.update');
            });
            #################################| Attributes Routes Dashboard |#################################
            Route::group(['middleware' => 'can:attributes'], function () {
                Route::resource('attributes', AttributeController::class);
                Route::get('attributes-all', [AttributeController::class, 'getAllAttributesForDatatable'])->name('attributes.all');
            });
        });
    }
);
