<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function allProducts()
    {
        $products = $this->productService->getAllProducts(2);
        return view('website.products', compact('products'));
    }
    public function getProductsByType($type)
    {
        if ($type == 'new-arrivals') {
            $products = $this->productService->newArrivalsProduct(2);
        } elseif ($type == 'flash-sale') {
            $products = $this->productService->getFlashProducts(2);
        } elseif ($type == 'flash-sale-with-timer') {
            $products = $this->productService->getFlashProductsWithTimer(2);
        } else {
            abort(404);
        }

        return view('website.products', [
            'products' => $products,
            'flash_timer' => $type == 'flash-sale-with-timer' ? true : false
        ]);
    }

    public function showProductPage($slug)
    {
        $product = $this->productService->getProductBySlug($slug);

        if (!$product) {
            abort(404);
        }
        $relatedProducts = $this->productService->getRelatedPorductsByCategory($product->category_id, 4);
        return view('website.show', compact('product', 'relatedProducts'));
    }
    public function relatedProduct($slug)
    {
        $productId = $this->productService->getProductBySlug($slug);

        if (!$productId) {
            abort(404);
        }
        $products = $this->productService->getRelatedPorductsByCategory($productId->category_id, 2);
        return view('website.products', compact('products'));
    }
}
