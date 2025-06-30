<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => ['en' => 'About Us', 'ar' => 'من نحن'],
            'content' => ['en' => 'This is the about us page content in English.', 'ar' => 'هذا هو محتوى صفحة من نحن باللغة العربية.'],
            'slug' => 'about-us',
        ]);
        Page::create([
            'title' => ['en' => 'Contact Us', 'ar' => 'اتصل بنا'],
            'content' => ['en' => 'This is the contact us page content in English.', 'ar' => 'هذا هو محتوى صفحة اتصل بنا باللغة العربية.'],
            'slug' => 'contact-us',
        ]);
    }
}
