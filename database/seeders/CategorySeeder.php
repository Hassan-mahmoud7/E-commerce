<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $data = [
            [
                'name' => ['en' => 'Dresses', 'ar' => 'فساتين'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Leather Bags', 'ar' => 'حقائب جلدية'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Sweaters', 'ar' => 'كنزات'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Boots', 'ar' => 'أحذية'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Gift for Him', 'ar' => 'هدية له'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Sneakers', 'ar' => 'أحذية رياضية'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Watch', 'ar' => 'ساعة'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Gold Rings', 'ar' => 'خواتم ذهبية'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Cap', 'ar' => 'قبعة'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Sunglass', 'ar' => 'نظارات شمسية'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Baby Shop', 'ar' => 'متجر الأطفال'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Leather Bags2', 'ar' => 'حقائب جلدية2'],
                'status' => 1,
                'image' => '',
                'parent' => null,
            ],
        ];

        $sourcePath = public_path('assets/website/assets/images/homepage-one/category-img/');
        $targetPath = public_path('assets/img/uploads/categories/');

        $files = File::files($sourcePath);
        $loopCount = min(count($files), count($data));

        for ($i = 0; $i < $loopCount; $i++) {
            $file = $files[$i];
            $fileName = $file->getFilename();
            $newPath = $targetPath . $fileName; 

            File::copy($file->getRealPath(), $newPath);

            $data[$i]['image'] = $fileName;
        }
        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
