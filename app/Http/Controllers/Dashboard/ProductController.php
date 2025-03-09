<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;
use App\Services\Dashboard\AttributeService;
use App\Services\Dashboard\BrandService;
use App\Services\Dashboard\CategoryService;
use App\services\Dashboard\ProductService;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    protected $productService ,$categoryService ,$brandService ,$attributeService;
    public function __construct(ProductService $productService,CategoryService $categoryService,BrandService $brandService,AttributeService $attributeService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->attributeService = $attributeService;
    }
    public function index()
    {
        return view('dashboard.products.index');
    }
    public function getAllProductsForDatatable() 
    {
        return $this->productService->getAllProductsForDatatable();    
    }
    public function create()
    {
        $brands =$this->brandService->getBrands();
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.products.create' , compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productService->getProductById($id);
        return view('dashboard.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $productId)
    {
        // $product = $this->productService->getProductByIdWithVariants($productId);
        $brands =$this->brandService->getBrands();
        $categories = $this->categoryService->getAllCategories();
        $attributes = $this->attributeService->getAttributes();
        return view('dashboard.products.edit', compact('productId','brands','categories','attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->productService->destroyProduct($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
    public function changeStatus($id)
    {
        $data = $this->productService->changeStatus($id);
        $product = $this->productService->getProductById($id);
       if ($product->status == 1) {
            return response()->json([
                'status' => 'success',
                'message' =>  __('dashboard.status_active_updated_successfully'),
                'data' =>  $product,

            ], 200);
        } elseif ($product->status == 0) {
            return response()->json([
                'status' => 'success_not_active',
                'message' =>  __('dashboard.status_not_active_updated_successfully'),
                'data' =>  $product,

            ], 200);
        }
        if (isNull($data)) {
            return response()->json(['status' => false, 'message' =>  __('dashboard.error_message')], 404);
        }
    }
    public function deleteVariant($variant_id)
    {
        $variant = $this->productService->destroyProductVariant($variant_id);
        if (!$variant) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 404);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
}
