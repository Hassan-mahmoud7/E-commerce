<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // DB::table('countries')->truncate();

        $countries = [
            [
                'id' => 1,
                'phone_code' => 20,
                'flag_code' => 'eg',
                'name' => ['en' => 'Egypt', 'ar' => 'مصر'],
            ],
            [
                'id' => 2,
                'phone_code' => 966,
                'flag_code' => 'sa',
                'name' => ['en' => 'Saudi Arabia', 'ar' => 'السعودية'],
            ],
            [
                'id' => 3,
                'phone_code' => 91,
                'flag_code' => 'in',
                'name' => ['en' => 'India', 'ar' => 'الهند'],
            ],
            [
                'id' => 4,
                'phone_code' => 62,
                'flag_code' => 'id',
                'name' => ['en' => 'Indonesia', 'ar' => 'أندونيسيا'],
            ],

            [
                'id' => 5,
                'phone_code' => 44,
                'flag_code' => 'gb',
                'name' => ['en' => 'United Kingdom', 'ar' => 'المملكة المتحدة'],
            ],
            [
                'id' => 6,
                'phone_code' => 971,
                'flag_code' => 'ae',
                'name' => ['en' => 'United Arab Emirates', 'ar' => 'الامارات العربية المتحده'],
            ],
            [
                'id' => 7,
                'phone_code' => 1,
                'flag_code' => 'us',
                'name' => ['en' => 'United States', 'ar' => 'الولايات المتحدة الأمريكية'],
            ],
            [
                'id' => 8,
                'phone_code' => 968,
                'flag_code' => 'om',
                'name' => ['en' => 'Oman', 'ar' => 'عمان'],
            ],
        ];
        foreach ($countries as  $country) {
            Country::create($country);
        }
    }
}
