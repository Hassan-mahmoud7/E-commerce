<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TestLanguageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('test_language', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required|unique_translation:categories',
            'slug' => 'required|unique:categories,slug',
        ]);
        $categories = Category::create($request->only(['name', 'slug']));
        if (!$categories) {
            return redirect()->back()->with('error', 'Failed to create category');
        }
        return redirect()->back()->with('success', 'created new category successfuly');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id)->first();
        // return $category;
        return view('test_language-edit', compact('category'));
    }
    // public function update(Request $request ,$id)
    // {
    //     $categories = Category::findOrFail($id);
    //     return view('test_language-edit', compact('categories'));
    // }
}
