<?php

namespace Database\Seeders;

use App\Models\Governorate;
use App\Models\ShippingGovernorates;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('governorates')->truncate();

        $governorates = [
            # Egypt
            [
                "id" => "1",
                "name" => [
                    'ar' => "القاهرة",
                    'en' => "Cairo"
                ],
                "country_id" => 1
            ],
            [
                "id" => "2",
                "name" => ['ar' => "الجيزة", 'en' => "Giza"],
                "country_id" => 1
            ],
            [
                "id" => "3",
                "name" => ['ar' => "الأسكندرية", 'en' => "Alexandria"],
                "country_id" => 1
            ],
            [
                "id" => "4",
                "name" => ['ar' => "الدقهلية", 'en' => "Dakahlia"],
                "country_id" => 1
            ],
            [
                "id" => "5",
                "name" => [
                    'ar' => "البحر الأحمر",
                    'en' => "Red Sea"
                ],
                "country_id" => 1
            ],
            [
                "id" => "6",
                "name" => [
                    'ar' => "البحيرة",
                    'en' => "Beheira"
                ],
                "country_id" => 1
            ],
            [
                "id" => "7",
                "name" => [
                    'ar' => "الفيوم",
                    'en' => "Fayoum"
                ],
                "country_id" => 1
            ],

            [
                "id" => "8",
                "name" => [
                    'ar' => "الغربية",
                    'en' => "Gharbiya"
                ],
                "country_id" => 1
            ],
            [
                "id" => "9",
                "name" => [
                    'ar' => "الإسماعلية",
                    'en' => "Ismailia"
                ],
                "country_id" => 1
            ],
            [
                "id" => "10",
                "name" => [
                    'ar' => "المنوفية",
                    'en' => "Menofia"
                ],
                "country_id" => 1
            ],
            [
                "id" => "11",
                "name" => [
                    'ar' => "المنيا",
                    'en' => "Minya"
                ],
                "country_id" => 1
            ],
            [
                "id" => "12",
                "name" => [
                    'ar' => "القليوبية",
                    'en' => "Qaliubiya"
                ],
                "country_id" => 1
            ],
            [
                "id" => "13",
                "name" => [
                    'ar' => "الوادي الجديد",
                    'en' => "New Valley"
                ],
                "country_id" => 1
            ],
            [
                "id" => "14",
                "name" => [
                    'ar' => "السويس",
                    'en' => "Suez"
                ],
                "country_id" => 1
            ],
            [
                "id" => "15",
                "name" => [
                    'ar' => "اسوان",
                    'en' => "Aswan"
                ],
                "country_id" => 1
            ],
            [
                "id" => "16",
                "name" => [
                    'ar' => "اسيوط",
                    'en' => "Assiut"
                ],
                "country_id" => 1
            ],
            [
                "id" => "17",
                "name" => [
                    'ar' => "بني سويف",
                    'en' => "Beni Suef"
                ],
                "country_id" => 1
            ],
            [
                "id" => "18",
                "name" => [
                    'ar' => "بورسعيد",
                    'en' => "Port Said"
                ],
                "country_id" => 1
            ],
            [
                "id" => "19",
                "name" => [
                    'ar' => "دمياط",
                    'en' => "Damietta"
                ],
                "country_id" => 1
            ],
            [
                "id" => "20",
                "name" => [
                    'ar' => "الشرقية",
                    'en' => "Sharkia"
                ],
                "country_id" => 1
            ],
            [
                "id" => "21",
                "name" => [
                    'ar' => "جنوب سيناء",
                    'en' => "South Sinai"
                ],
                "country_id" => 1
            ],
            [
                "id" => "22",
                "name" => [
                    'ar' => "كفر الشيخ",
                    'en' => "Kafr Al sheikh"
                ],
                "country_id" => 1
            ],
            [
                "id" => "23",
                "name" => [
                    'ar' => "مطروح",
                    'en' => "Matrouh"
                ],
                "country_id" => 1
            ],
            [
                "id" => "24",
                "name" => [
                    'ar' => "الأقصر",
                    'en' => "Luxor"
                ],
                "country_id" => 1
            ],
            [
                "id" => "25",
                "name" => [
                    'ar' => "قنا",
                    'en' => "Qena"
                ],
                "country_id" => 1
            ],
            [
                "id" => "26",
                "name" => [
                    'ar' => "شمال سيناء",
                    'en' => "North Sinai"
                ],
                "country_id" => 1
            ],
            [
                "id" => "27",
                "name" => ['ar' => "سوهاج", 'en' => "Sohag"],
                "country_id" => 1
            ],
            # Saudi Arabia
            [
                "id" => "28",
                "name" => ['ar' => "الرياض", 'en' => "Riyadh"],
                "country_id" => 2
            ],
            [
                "id" => "29",
                "name" => ['ar' => "جدة", 'en' => "Jeddah"],
                "country_id" => 2
            ],
            [
                "id" => "30",
                "name" => ['ar' => "مكة المكرمة", 'en' => "Makkah"],
                "country_id" => 2
            ],
            [
                "id" => "31",
                "name" => ['ar' => "المدينة المنورة", 'en' => "Medina"],
                "country_id" => 2
            ],
            [
                "id" => "32",
                "name" => ['ar' => "الدمام", 'en' => "Dammam"],
                "country_id" => 2
            ],
            [
                "id" => "33",
                "name" => ['ar' => "الطائف", 'en' => "Taif"],
                "country_id" => 2
            ],
            [
                "id" => "34",
                "name" => ['ar' => "تبوك", 'en' => "Tabuk"],
                "country_id" => 2
            ],
            [
                "id" => "35",
                "name" => ['ar' => "خميس مشيط", 'en' => "Khamis Mushait"],
                "country_id" => 2
            ],
            [
                "id" => "36",
                "name" => ['ar' => "حائل", 'en' => "Hail"],
                "country_id" => 2
            ],
            [
                "id" => "37",
                "name" => ['ar' => "جيزان", 'en' => "Jizan"],
                "country_id" => 2
            ],
            [
                "id" => "38",
                "name" => ['ar' => "أبها", 'en' => "Abha"],
                "country_id" => 2
            ],
            [
                "id" => "39",
                "name" => ['ar' => "الباحة", 'en' => "Al Bahah"],
                "country_id" => 2
            ],
            [
                "id" => "40",
                "name" => ['ar' => "عرعر", 'en' => "Arar"],
                "country_id" => 2
            ],
            [
                "id" => "41",
                "name" => ['ar' => "نجران", 'en' => "Najran"],
                "country_id" => 2
            ],
            # India
            [
                "id" => "42",
                "name" => ["ar" => "ماهاراشترا", "en" => "Maharashtra"],
                "country_id" => 3
            ],
            [
                "id" => "43",
                "name" => ["ar" => "كارناتاكا", "en" => "Karnataka"],
                "country_id" => 3
            ],
            [
                "id" => "44",
                "name" => ["ar" => "تاميل نادو", "en" => "Tamil Nadu"],
                "country_id" => 3
            ],
            # Indonesia
            [
                "id" => "45",
                "name" => ["ar" => "جاكرتا", "en" => "Jakarta"],
                "country_id" => 4
            ],
            [
                "id" => "46",
                "name" => ["ar" => "بالي", "en" => "Bali"],
                "country_id" => 4
            ],
            [
                "id" => "47",
                "name" => ["ar" => "يوجياكارتا", "en" => "Yogyakarta"],
                "country_id" => 4
            ],
            # United Kingdom
            [
                "id" => "48",
                "name" => ["ar" => "لندن", "en" => "London"],
                "country_id" => 5
            ],
            [
                "id" => "49",
                "name" => ["ar" => "مانشستر", "en" => "Manchester"],
                "country_id" => 5
            ],
            [
                "id" => "50",
                "name" => ["ar" => "برمنغهام", "en" => "Birmingham"],
                "country_id" => 5
            ],
            # United Arab Emirates
            [
                "id" => "51",
                "name" => ["ar" => "دبي", "en" => "Dubai"],
                "country_id" => 6
            ],
            [
                "id" => "52",
                "name" => ["ar" => "أبو ظبي", "en" => "Abu Dhabi"],
                "country_id" => 6
            ],
            [
                "id" => "53",
                "name" => ["ar" => "الشارقة", "en" => "Sharjah"],
                "country_id" => 6
            ],
            # United States
            [
                "id" => "54",
                "name" => ["ar" => "كاليفورنيا", "en" => "California"],
                "country_id" => 7
            ],
            [
                "id" => "55",
                "name" => ["ar" => "نيويورك", "en" => "New York"],
                "country_id" => 7
            ],
            [
                "id" => "56",
                "name" => ["ar" => "فلوريدا", "en" => "Florida"],
                "country_id" => 7
            ], 
            # Oman
            [
                "id" => "57",
                "name" => ["ar" => "مسقط", "en" => "Muscat"],
                "country_id" => 8
            ],
            [
                "id" => "58",
                "name" => ["ar" => "صلالة", "en" => "Salalah"],
                "country_id" => 8
            ],
            [
                "id" => "59",
                "name" => ["ar" => "نزوى", "en" => "Nizwa"],
                "country_id" => 8
            ],
        ];
        foreach ($governorates as  $governorate) {
           $gover =  Governorate::create($governorate);

           ShippingGovernorates::create([
            'price' => 100,
            'governorate_id' => $gover->id,
           ]);
        }
    }
}
