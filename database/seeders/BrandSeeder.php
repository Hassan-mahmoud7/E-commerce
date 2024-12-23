<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $data = [
            [
                'name' => ['en' => 'Apple', 'ar' => 'آبل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'
            ],
            [
                'name' => ['en' => 'Samsung', 'ar' => 'سامسونج'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg'
            ],
            [
                'name' => ['en' => 'Microsoft', 'ar' => 'مايكروسوفت'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'
            ],
            [
                'name' => ['en' => 'Google', 'ar' => 'جوجل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'
            ],
            [
                'name' => ['en' => 'Huawei', 'ar' => 'هواوي'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/29/Huawei_standard_logo.svg'
            ],
            [
                'name' => ['en' => 'Sony', 'ar' => 'سوني'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Sony_logo.svg'
            ],
            [
                'name' => ['en' => 'LG', 'ar' => 'إل جي'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/55/LG_logo_%282014%29.svg'
            ],
            [
                'name' => ['en' => 'Dell', 'ar' => 'ديل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg'
            ],
            [
                'name' => ['en' => 'HP', 'ar' => 'إتش بي'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/92/HP_logo_2012.svg'
            ],
            [
                'name' => ['en' => 'Lenovo', 'ar' => 'لينوفو'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/cd/Lenovo_logo_2015.svg'
            ],
            [
                'name' => ['en' => 'Asus', 'ar' => 'أسوس'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/57/ASUS_Logo.svg'
            ],
            [
                'name' => ['en' => 'Acer', 'ar' => 'أيسر'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/f5/Acer_2011.svg'
            ],
            [
                'name' => ['en' => 'Intel', 'ar' => 'إنتل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Intel_logo_%282020%29.svg'
            ],
            [
                'name' => ['en' => 'AMD', 'ar' => 'إيه إم دي'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/AMD_logo.svg'
            ],
            [
                'name' => ['en' => 'Nvidia', 'ar' => 'نيفيديا'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Nvidia_logo.svg'
            ],
            [
                'name' => ['en' => 'Tesla', 'ar' => 'تسلا'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Tesla_Motors.svg'
            ],
            [
                'name' => ['en' => 'Ford', 'ar' => 'فورد'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Ford_logo_flat.svg'
            ],
            [
                'name' => ['en' => 'BMW', 'ar' => 'بي إم دبليو'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg'
            ],
            [
                'name' => ['en' => 'Mercedes-Benz', 'ar' => 'مرسيدس بنز'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/90/Mercedes-Logo.svg'
            ],
            [
                'name' => ['en' => 'Toyota', 'ar' => 'تويوتا'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Toyota_logo.svg'
            ],
        ];
        foreach ($data as $brand) {
            Brand::create($brand);
        }
    }
}
