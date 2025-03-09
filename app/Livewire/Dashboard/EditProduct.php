<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Attribute;
use App\services\Dashboard\ProductService;
use Illuminate\Support\Facades\Session;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditProduct extends Component
{ 
    use WithFileUploads; // useing file (image,.....)
    public $currentStep = 1;
    public $successMessage = '' , $errorMessage = '';
    public $product;
    public $valueRowCount = 0;
    public $fullscreenImage = '';
    public $categories , $brands ,$productId ,$productAttributes = [];
    // First Step properities
    public $name_en, $name_ar, $desc_en, $desc_ar, $small_desc_en, $small_desc_ar, $category_id, $brand_id, $sku, $available_for, $product_tags;
    public $tags, $discount, $start_discount, $end_discount, $price, $quantity;
    
    // Second Step properities
    public $manage_stock = 0, $has_variants = 0, $has_discount = 0;
    public $prices = [] , $quantities = [] , $variants , $variantAttributes;
    
    // therd step properities
    public $images,  $new_images;
    
    
    protected ProductService $productService ;
    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function mount($categories, $brands ,$productId ,$productAttributes)
    {
        $this->product = $this->productService->getProductById($productId);
        $this->categories = $categories;
        $this->brands = $brands;
        $this->productId = $productId;
        $this->productAttributes = $productAttributes;
        
        // First Step properities
        $this->name_en = $this->product->getTranslation('name', 'en');
        $this->name_ar = $this->product->getTranslation('name', 'ar');
        $this->desc_en = $this->product->getTranslation('desc', 'en');
        $this->desc_ar = $this->product->getTranslation('desc', 'ar');
        $this->small_desc_en = $this->product->getTranslation('small_desc', 'en');
        $this->small_desc_ar = $this->product->getTranslation('small_desc', 'ar');
        $this->category_id = $this->product->category_id;
        $this->brand_id = $this->product->brand_id;
        $this->sku = $this->product->sku;
        $this->available_for = $this->product->available_for;
        // $this->product_tags = $this->product->productTags()->pluck('product_tags');
        
        // second step properities
        $this->manage_stock = $this->product->manage_stock;
        $this->has_variants = $this->product->has_variants;
        $this->has_discount = $this->product->has_discount;
        $this->discount = $this->product->discount;
        $this->start_discount = $this->product->start_discount;
        $this->end_discount = $this->product->end_discount;
        $this->price = $this->product->price;
        $this->quantity = $this->product->quantity;
        
        if ($this->has_variants == 1) {
            $this->variants = $this->product->productVariants;
            $this->valueRowCount = count( $this->variants);
            foreach ($this->variants as $key => $variant) {
                $this->prices[$key] = $variant->price;
                $this->quantities[$key] = $variant->stock;
                foreach ($variant->variantAttributes as $variantAttribute) {
                    $this->variantAttributes[$key][$variantAttribute->attributeValue->attribute_id] = $variantAttribute->attribute_value_id ;
                }
            }
        } 

        //therd step properities
        $this->images = $this->product->images;
    }
    public function firstStepSubmit()
    {
        $this->validate([
            'name_en'       => ['required', 'string', 'min:2', 'max:80'],
            'name_ar'       => ['required', 'string', 'min:2', 'max:80'],
            'desc_en'       => ['required', 'string', 'min:10', 'max:1000'],
            'desc_ar'       => ['required', 'string', 'min:10', 'max:1000'],
            'small_desc_en' => ['required', 'string', 'min:10', 'max:200'],
            'small_desc_ar' => ['required', 'string', 'min:10', 'max:200'],
            'category_id'   => ['required', 'exists:categories,id'],
            'brand_id'      => ['required', 'exists:brands,id'],
            'sku'           => ['required', 'string', 'max:30'],
            'available_for' => ['required', 'date'],
        ]);
        $this->currentStep = 2;
    }
    public function backStep($number)
    {
        $this->currentStep = $number;
    }
    public function secondStepSubmit()
    {
        $data = [
            'manage_stock' => ['required', 'in:0,1'],
            'has_variants' => ['required', 'in:0,1'],
            'has_discount' => ['required', 'in:0,1'],
        ];
        if ($this->has_variants == 0) {
            $data['price'] = ['required', 'numeric', 'min:1', 'max:1000000'];
        }
        if ($this->manage_stock == 1 && $this->has_variants == 0) {
            $data['quantity'] = ['required', 'integer', 'min:1', 'max:1000000'];
        }
        if ($this->has_discount == 1) {
            $data['discount'] = ['required', 'numeric', 'between:1,100'];
            $data['start_discount'] = ['required_if:has_discount,1', 'date', 'before:end_discount'];
            $data['end_discount'] = ['required_if:has_discount,1', 'date', 'after:start_discount'];
        }
        if ($this->has_variants == 1) {
            $data['prices'] = ['required', 'array', 'min:1'];
            $data['prices.*'] = ['required', 'numeric', 'min:1', 'max:1000000'];
            $data['quantities'] = ['required', 'array', 'min:1'];
            $data['quantities.*'] = ['required', 'integer', 'min:1', 'max:1000000'];
            $data['variantAttributes'] = ['required', 'array', 'min:1'];
            $data['variantAttributes.*'] = ['required', 'array'];
            $data['variantAttributes.*.*'] = ['required', 'integer','exists:attribute_values,id'];

        }
        $this->validate($data);
        $this->currentStep = 3;
    } 
    public function addNewVariant()
    {
        $this->prices[] = null;
        $this->quantities[] = null;
        $this->variantAttributes[] = [];
        $this->valueRowCount = count($this->prices); // Keep count synchronized
    }
    public function removeVariant()
    {
        if($this->valueRowCount > 1){
            $this->valueRowCount--;
            array_pop($this->prices);
            array_pop($this->quantities);
            array_pop($this->variantAttributes);
        }
    }
    public function deleteImage($key , $image_id , $image_file_name)
    {
        $this->productService->deleteProductImage($image_id,$image_file_name);
        unset($this->images[$key]);
    }
    public function deleteNewImage($key)
    {
        unset($this->new_images[$key]);
    }
    public function openFullscreen($file_name)
    {
        $this->fullscreenImage = asset('assets/img/uploads/products/' . $file_name);
        $this->dispatch('showFullscreenModal');
    }
    public function openFullscreenNew($key)
    {
        $this->fullscreenImage = $this->new_images[$key]->temporaryUrl();
        $this->dispatch('showFullscreenModal');
    }
    public function submitForm()
    {
        $this->validate([
            'images' => ['required', 'array'],
        ]);
        $productData =[
            'name' => ['en' => $this->name_en, 'ar' => $this->name_ar],
            'desc' => ['en' => $this->desc_en, 'ar' => $this->desc_ar],
            'small_desc' => ['en' => $this->small_desc_en, 'ar' => $this->small_desc_ar],
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'sku' => $this->sku,
            'available_for' => $this->available_for,
            'has_variants' => $this->has_variants,
            'price' => $this->has_variants == 1 ? null : $this->price,
            'manage_stock' => $this->has_variants == 1 ? 1 : $this->manage_stock,
            'quantity' => $this->manage_stock == 0 ? null : $this->quantity,
            'has_discount' => $this->has_discount,
            'discount' => $this->has_discount == 0 ? null : $this->discount,
            'start_discount' => $this->has_discount == 0 ? null : $this->start_discount,
            'end_discount' => $this->has_discount == 0 ? null : $this->end_discount,
        ];
        $productVariants = [];
        if ($this->has_variants == 1) {
            foreach ($this->prices as $index => $price) {
                $productVariants[] = [
                    'product_id' => $this->product->id,
                    'price' => $price,
                    'stock' => $this->quantities[$index] ?? 0,
                    'attribute_value_ids' => $this->variantAttributes[$index],
                ];
                
            }
        }
        $productUpdated = $this->productService->updatedProductWithDetails($this->product,$productData,$productVariants,$this->new_images);
    
        if (!$productUpdated) {
            $this->errorMessage = __('dashboard.error_message');
            $this->currentStep = 1;
        }    
    
        Session::flash('success' , __('dashboard.product') . ' ' . __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.products.index');
    
    }
    public function render()
    {
        return view('livewire.dashboard.edit-product');
    }
}
