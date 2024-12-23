<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        $categories = Category::withCount(['products'])->latest()->get();     // eager loading
        return $categories;    
    }
    public function getCategoryByid($id)
    {
        $category = Category::find($id);
        return $category;
    }
    public function store($data)
    {
        $category = Category::create($data);
        return $category;
    }
    public function update($category, $data)
    {
        $category = $category->update($data);
        return $category;
    }
    public function destroy($category)
    {
        return $category->delete();
    }
    public function getCategoriesExceptChildren($id)
    {
        $categories = Category::where('id', '!=', $id)
        ->whereNull('parent')
        ->get();
        return $categories;
    }
    public function getParentCategories()
    {
        $categories = Category::whereNull('parent')->get();
        return $categories;
    }
    public function changeStatus($category)
    {
        $category = $category->status == 1 ?
         $category->update(['status' => 0]) : $category->update(['status' => 1]);
        return $category;
    }

}
