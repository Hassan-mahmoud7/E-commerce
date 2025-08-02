<?php

namespace App\services\Website;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Cache\RateLimiting\Limit;

class GlobalService
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function getSlider()
    {
        return Slider::latest()->get();
    }
    public function getBrands($limit = null)
    {
        if ($limit == null) {
            return Brand::active()->latest()->get();
        }
        return Brand::active()->latest()->limit($limit)->get();
    }
    public function getCategories($limit = null)
    {
        if ($limit == null) {
            return Category::active()->latest()->get();
        }
        return Category::active()->latest()->limit($limit)->get();
    }
    public function getProductsByCategory($slug)
    {
        $category_id = Category::where('slug', $slug)->first()->id;

        $products = Product::with('images', 'category', 'brand')->active()->latest()
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->where('category_id', $category_id)->paginate(1);

        return $products;
    }
    public function getProductsByBrand($slug)
    {
        $brand_id = Brand::where('slug', $slug)->active()->first()->id;

        $products = Product::with('images', 'category', 'brand')->active()->latest()
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->where('brand_id', $brand_id)->paginate(3);

        return $products;
    }
    public function getHomePageProducts($limit = null, $limitFlashProducts = null): array
    {
        return [
            'newArrivals'               => $this->productService->newArrivalsProduct($limit),
            'flashProducts'             => $this->productService->getFlashProducts($limitFlashProducts),
            'flashProductsWithTimer'    => $this->productService->getFlashProductsWithTimer($limit)
        ];
    }
}