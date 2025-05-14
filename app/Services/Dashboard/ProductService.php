<?php

namespace App\services\Dashboard;

use App\Utils\ImageManger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\ProductRepository;

class ProductService
{
    protected $productRepository, $imageManager;
    public function __construct(ProductRepository $productRepository, ImageManger $imageManager)
    {
        $this->productRepository = $productRepository;
        $this->imageManager = $imageManager;
    }
    public function getAllProductsForDatatable()
    {
        $products = $this->productRepository->getProducts();
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name', function ($item) {
                return $item->name;
            })
            ->addColumn('images', function ($item) {
                return view('dashboard.products.dataTable.images', compact('item'));
            })
            ->addColumn('status', function ($item) {
                return $item->getStatusTranslated();
            })
            ->addColumn('price', function ($item) {
                return $item->priceAttribute();
            })
            ->addColumn('quantity', function ($item) {
                return $item->quantityAttribute();
            })
            ->addColumn('category', function ($item) {
                return $item->category->name;
            })
            ->addColumn('brand', function ($item) {
                return $item->brand->name;
            })
            ->addColumn('has_variants', function ($item) {
                return $item->hasVariantstranslated();
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.products.dataTable.actions', compact('item'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getProductById($id)
    {
        $product = $this->productRepository->getProductById($id);
        return $product ?? abort(404);
    }
    public function getProductByIdWithVariants($id)
    {
        $product = $this->productRepository->getProductByIdWithVariants($id);
        return $product ?? abort(404);
    }
    public function destroyProduct($id)
    {
        $product = $this->getProductById($id);
        $product = $this->productRepository->destroyProduct($product);
        $this->productsCache();
        return $product;
    }
    public function changeStatus($id)
    {
        $product = $this->getProductById($id);
        if ($product->status == 0) {
            $this->productRepository->changeStatus($product, 1);
            return 1;
        } elseif ($product->status == 1) {
            $this->productRepository->changeStatus($product, 0);
            return 2;
        }
    }
    public function createProductWithDetails($product, $productVariant, $images)
    {
        try {
            DB::beginTransaction();
            // create product
            $product = $this->productRepository->createProduct($product);
            // create product variants
            foreach ($productVariant as $variant) {
                $variant['product_id'] = $product->id;
                $productVariant = $this->productRepository->createProductVariant($variant);
                // create variants attributes
                foreach ($variant['attribute_value_ids'] as $attributeValueId) {
                    $this->productRepository->createProductVariantAttribute([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $attributeValueId,
                    ]);
                }
            }
            // create product images
            $this->imageManager->uploadImages($images, $product, 'products');
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            Log::error("error products", $e->getMessage());
            return false;
        }
    }
    public function updatedProductWithDetails($product,$product_data, $productVariant, $images)
    {
        try {
            DB::beginTransaction();
            // update simple product
            $productStatus = $this->productRepository->updateProduct($product,$product_data);
            if (!$productStatus) {
                return false;
            }
            // delete old product variants
            $this->productRepository->deleteProductVariants($product->id);
            // update product new variants
            foreach ($productVariant as $variant) {
                $productVariant = $this->productRepository->createProductVariant($variant);
                if (!$productVariant) {
                    return false;
                }
                // update variants attributes
                foreach ($variant['attribute_value_ids'] as $attributeValueId) {
                    $variantAttributes = $this->productRepository->createProductVariantAttribute([
                        'product_variant_id' => $productVariant->id,
                        'attribute_value_id' => $attributeValueId,
                    ]);
                    if (!$variantAttributes) {
                        return false;
                    }
                }
            }
            // update product images
            if (!empty($images)) {
                $this->imageManager->uploadImages($images, $product, 'products');
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            Log::error("error products", $e->getMessage());
            return false;
        }
    }
    public function destroyProductVariant($id)
    {
        $variant = $this->productRepository->getProductVariantById($id);
        $product = $variant->product;
        if ($product->productVariants->count() == 1) {
            return false;
        }
        $variant = $this->productRepository->destroyProductVariant($variant);
        return true;
    }
    public function productsCache()
    {
        Cache::forget('products_count');
    }
    public function getImageById($id)
    {
        $image = $this->productRepository->getImageById($id);
        return $image ?? abort('404');
    }
    public function deleteProductImage($id, $image_file_name)
    {
        // delete image from local
        $this->imageManager->deleteImageFromLocal('assets/img/uploads/products/' . $image_file_name);
        // delete image from DB
        $image = $this->getImageById($id);
        return $this->productRepository->deleteImage($image);
    }
}
