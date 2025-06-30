<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Dashboard\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function getAllCategoriesForDatatable()
    {
        return $this->categoryService->getAllCategoriesForDatatable();
       
    }
    public function create()
    {
        $categories = $this->categoryService->getParentCategories();
        if (!$categories) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return view('dashboard.categories.create',compact('categories')); 
    }

   
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['name','parent','status','image']);
        $category = $this->categoryService->store($data);
        if (!$category) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.categories.index')->with('success', __('dashboard.created_successfully'));
    }
    public function edit(string $id)
    {
        $category = $this->categoryService->getCategoryByid($id);
        $categories = $this->categoryService->getCategoriesExceptChildren($id);
        return view('dashboard.categories.edit',compact('categories','category'));
    }
    public function update(CategoryRequest $request, string $id)
    {
        
        $data = $request->only(['name','parent','status','image','id']);
        $category = $this->categoryService->update($data,$id);
        if (!$category) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }

        return redirect()->back()->with('success', __('dashboard.updated_successfully'));
    }
    public function destroy(string $id)
    {
         $category = $this->categoryService->destroy($id);
        if (!$category) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->back()->with('success', __('dashboard.deleted_successfully'));
    }
    public function ChangeStatus($id)  
    {
        $status = $this->categoryService->changeStatus($id);
        if (!$status) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        if ($status == 1) {
            return redirect()->back()->with('success', __('dashboard.status_active_updated_successfully'));     
        }elseif($status == 2){
            return redirect()->back()->with('success', __('dashboard.status_not_active_updated_successfully'));
        }
    }
}
