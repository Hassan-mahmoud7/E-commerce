<?php

namespace App\Repositories\Dashboard;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;

class ProductRepository
{
    public function getProducts()
    {
       $products = Product::with('images')->latest()->get();
       return $products;
    }
    public function getProductByIdWithVariants($id)
    {
        $product = Product::with(['images','productVariants.variantAttributes.attributeValue.attribute'])->find($id);
        return $product;
    }
    public function getProductById($id)
    {
        $product = Product::with('images')->find($id);
        return $product;
    }
    public function createProduct($data)
    {
        return Product::create($data);
    }
    public function createProductVariant($data)
    {
        return ProductVariant::create($data);
    }
    public function createProductVariantAttribute($data)
    {
        return VariantAttribute::create($data);
    }
    public function updateProduct($product, $data)
    {
        $product->update($data);
        return $product;
    }
    public function destroyProduct($product)
    {
        return $product->delete();
    }
    public function changeStatus($product)
    {
        $product = $product->status == 1 ? $product->update(['status' => 0]) : $product->update(['status' => 1]);
        return $product;
    }
    public function getProductVariantById($id)
    {
        $variant = ProductVariant::find($id);
        return $variant;
    }
    public function destroyProductVariant($variant)
    {
        return $variant->delete();
    }
    public function getImageById($id)
    {
        return ProductImage::find($id);
    }
    public function deleteImage($image)
    {
        return $image->delete();
    }
    public function deleteProductVariants($productId)
    {
       return ProductVariant::where('product_id', $productId)->delete();
    }
}
