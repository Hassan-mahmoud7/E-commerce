<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('dashboard.*', function ($view) {
            if (!Cache::has('categories_count')) {
                Cache::remember('categories_count', now()->addMinutes(60), function () {
                    return Category::count();
                });
            }
            if (!Cache::has('brands_count')) {
                Cache::remember('brands_count', now()->addMinutes(60), function () {
                    return Brand::count();
                });
            }
            if (!Cache::has('admins_count')) {
                Cache::remember('admins_count', now()->addMinutes(60), function () {
                    return Admin::count();
                });
            }
            if (!Cache::has('coupons_count')) {
                Cache::remember('coupons_count', now()->addMinutes(60), function () {
                    return Coupon::count();
                });
            }
            if (!Cache::has('faqs_count')) {
                Cache::remember('faqs_count', now()->addMinutes(60), function () {
                    return Faq::count();
                });
            }
            if (!Cache::has('products_count')) {
                Cache::remember('products_count', now()->addMinutes(60), function () {
                    return Product::count();
                });
            }
            if (!Cache::has('users_count')) {
                Cache::remember('users_count', now()->addMinutes(60), function () {
                    return User::count();
                });
            }
            if(!Cache::has('contacts_count')) {
                Cache::remember('contact_count', now()->addMinutes(60), function () {
                    return Contact::where('is_read',0)->count();
                });
            }
            view()->share([
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
                'admins_count' => Cache::get('admins_count'),
                'coupons_count' => Cache::get('coupons_count'),
                'faqs_count' => Cache::get('faqs_count'),
                'products_count' => Cache::get('products_count'),
                'users_count' => Cache::get('users_count'),
                'contacts_count' => Cache::get('contact_count'),
            ]);
        });
        // git setting And Share
        view()->share('setting', $this->firstOrCreateSetting());
    }
    public function firstOrCreateSetting()
    {
        $getSetting = Setting::firstOr(function () {
            return Setting::create([
                'id' => 1,
                'site_name' => [
                    'en' => 'E-Commerce',
                    'ar' => 'تجارة الكترونية',
                ],
                'small_desc' => [
                    'en' => 'E-Commerce is a platform that offers various products and services.',
                    'ar' => 'تجارة الكترونية هي منصة توفر منتجات وخدمات متنوعة.',
                ],
                'meta_desc' => [
                    'en' => 'E-Commerce is a platform that offers various products and services.',
                    'ar' => 'تجارة الكترونية هي منصة توفر منتجات وخدمات متنوعة.',
                ],
                'address' => [
                    'en' => 'Egypt, Alexandria, Sidi Bishr',
                    'ar' => 'مصر, الاسكندرية, سيدى بشر',
                ],
                'logo' => 'logo.webp',
                'favicon' => 'icon.png',
                'email' => 'info@e-commerce.com',
                'email_support' => 'support@e-commerce.com',
                'phone' => '0123456789',
                'facebook' => 'https://www.facebook.com/ecommerce',
                'twitter' => 'https://www.twitter.com/ecommerce',
                'instagram' => 'https://www.instagram.com/ecommerce',
                'youtube' => 'https://www.youtube.com/ecommerce',
                'site_copyright' => '�� 2022 E-Commerce. All rights reserved.',
                'promotion_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            ]);
        });
        return $getSetting;
    }
}
