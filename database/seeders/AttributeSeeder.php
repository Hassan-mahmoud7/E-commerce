<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Attribute::truncate();
        AttributeValue::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $size_attribute = Attribute::create([
            'name' => [
                'en' => 'Size',
                'ar' => 'الحجم',
            ],
        ]);
        $size_attribute->attributeValues()->createMany([
            [
                'value' => [
                    'en' => 'small',
                    'ar' => 'صغير',
                ],
            ],
            [
                'value' => [
                    'en' => 'medium',
                    'ar' => 'متوسط',
                ],
            ],
            [
                'value' => [
                    'en' => 'large',
                    'ar' => 'كبير',
                ],
            ]
        ]);
        $color_attribute = Attribute::create([
            'name' => [
                'en' => 'Color',
                'ar' => 'اللون',
            ],
        ]);
        $color_attribute->attributeValues()->createMany([
            [
                'value' => [
                    'en' => 'red',
                    'ar' => 'أحمر',
                ],
            ],
            [
                'value' => [
                    'en' => 'blue',
                    'ar' => 'أزرق',
                ],
            ],
            [
                'value' => [
                    'en' => 'green',
                    'ar' => 'أخضر',
                ],
            ],
            [
                'value' => [
                    'en' => 'yellow',
                    'ar' => 'أصفر',
                ],
            ],
            [
                'value' => [
                    'en' => 'black',
                    'ar' => 'أسود',
                ],
            ],
            [
                'value' => [
                    'en' => 'white',
                    'ar' => 'أبيض',
                ],
            ],
            [
                'value' => [
                    'en' => 'purple',
                    'ar' => 'بنفسج',
                ],
            ],
            [
                'value' => [
                    'en' => 'pink',
                    'ar' => 'أصفر محبوب',
                ],
            ],
            [
                'value' => [
                    'en' => 'orange',
                    'ar' => 'أحمر متوسط',
                ],
            ],
            [
                'value' => [
                    'en' => 'brown',
                    'ar' => 'بني',
                ],
            ],
            [
                'value' => [
                    'en' => 'gray',
                    'ar' => 'رمادي',
                ],
            ],
            [
                'value' => [
                    'en' => 'silver',
                    'ar' => 'ذهبي',
                ],
            ]
        ]);

        // foreach ($attributes as $attribute) {
        //     Attribute::create($attribute);
        // }
    }
}
