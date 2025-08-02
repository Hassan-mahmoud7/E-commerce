<?php

namespace App\Services\Website;

use App\Models\Product;

class ProductService
{
    public function getProductBySlug($slug)
    {
        return Product::active()->with(['category', 'brand', 'images', 'productPreviews', 'productVariants'])
            ->select('id', 'name', 'slug', 'price', 'desc', 'small_desc', 'sku', 'quantity', 'manage_stock', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->where('slug', $slug)
            ->first();
    }
    public function getAllProducts($limit = null)
    {
        return Product::active()->with(['category', 'brand', 'images'])
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->latest()
            ->paginate($limit);
    }
    public function getRelatedPorductsByCategory($categoryId, $limit = null)
    {
        return Product::active()->with(['category', 'brand', 'images'])
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->whereCategoryId($categoryId)
            ->latest()
            ->paginate($limit);
    }
    public function newArrivalsProduct($limit = null)
    {
        return Product::active()->with(['category', 'brand', 'images'])
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->latest()
            ->paginate($limit);
    }
    public function getFlashProducts($limit = null)
    {
        return Product::active()->with(['category', 'brand', 'images'])
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->where('has_discount', 1)
            ->latest()
            ->paginate($limit);
    }
    public function getFlashProductsWithTimer($limit = null)
    {
        return Product::active()->with(['category', 'brand', 'images'])
            ->select('id', 'name', 'slug', 'price', 'has_variants', 'has_discount', 'discount', 'brand_id', 'category_id')
            ->where('available_for', date('Y-m-d'))->whereNotNull('available_for')
            ->where('has_discount', 1)
            ->latest()
            ->paginate($limit);
    }
}
