<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => ['en' => 'Electronics', 'ar' => 'إلكترونيات'],
                'status' => 1,
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Clothing', 'ar' => 'ملابس'],
                'status' => 1,
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Books', 'ar' => 'كتب'],
                'status' => 1,
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Furniture', 'ar' => 'أثاث'],
                'status' => 1,
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Toys', 'ar' => 'ألعاب'],
                'status' => 1,
                'parent' => null,
            ],
            [
                'name' => ['en' => 'Groceries', 'ar' => 'بقالة'],
                'status' => 1,
                'parent' => null,
            ],
        ];
        foreach ($data as $category) {
            Category::create($category);
        }
    }
}
