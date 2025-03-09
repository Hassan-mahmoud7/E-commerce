<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\isNull;

use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategoriesForDatatable()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('name', function ($category) {
                return $category->name;
            })
            ->addColumn('products_count',function ($category) {
                return $category->products_count == 0 ? __('dashboard.not_found') : $category->products_count;
            })
            ->addColumn('status', function ($category) {
                return $category->getStatusTranslated();
            })
            ->addColumn('action', function ($category) {
                return view('dashboard.categories.actions', compact('category'));
            })
            ->make(true);
    }
    public function getAllCategories()
    {
       return $this->categoryRepository->getAllCategories();
    }
    public function getCategoryByid($id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        if (!$category) {
            abort(404);
        }
        return $category;
    }
    public function store($data)
    {
        $category = $this->categoryRepository->store($data);
        if (!$category) {
            return false;
        }
        $this->categoryCache();
        return $category;
    }
    public function update($data,$id)
    {
        $category = $this->getCategoryById($id);
        if (!$category) {
            return false;
        }
        $category = $this->categoryRepository->update($category, $data);
        if (!$category) {
            return false;
        }
        return $category;
    }
    public function destroy($id)
    {
        $category = $this->getCategoryById($id);
        $category = $this->categoryRepository->destroy($category);
        $this->categoryCache();
        if (!$category) {
            return false;
        }
        return $category;
    }
    public function changeStatus($id)
    {
        $category = $this->getCategoryById($id);
        if ($category->status == 0) {
            $this->categoryRepository->changeStatus($category,1);
            return 1;
        } elseif ($category->status == 1) {
            $this->categoryRepository->changeStatus($category,0);
            return 2;
        }
    }
    public function getCategoriesExceptChildren($id)
    {
        $categories = $this->categoryRepository->getCategoriesExceptChildren($id);
        return $categories;
    }
    public function getParentCategories()
    {
        $categories = $this->categoryRepository->getParentCategories();
        return $categories;
    }
    public function categoryCache()
    {
        Cache::forget('categories_count');
    }
}
