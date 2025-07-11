<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::truncate();
        for ($i = 1; $i <= 4; $i++) {
            Slider::create([
                'file_name' => 'slider' . $i . '.jpg',
                'note' => [
                    'en' => 'Fashion Collection Summer Sale 50% Descount',
                    'ar' => 'تخفيضات الصيف 50% على مجموعة الأزياء',
                ],
            ]);
        }
    }
}
