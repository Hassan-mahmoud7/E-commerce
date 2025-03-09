<?php

namespace App\Livewire\Dashboard;

use App\Models\Product;
use Livewire\Component;
use App\Models\Attribute;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;
use App\services\Dashboard\ProductService;
use App\Utils\ImageManger;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads; // useing file (image,.....)
    public $currentStep = 1;
    public $successMessage = '';
    public $categories, $brands;
    public $name_en, $name_ar, $desc_en, $desc_ar, $small_desc_en, $small_desc_ar, $category_id, $brand_id, $sku, $available_for, $product_tags;
    public $manage_stock = 0, $has_variants = 0, $has_discount = 0;
    public $images, $tags, $discount, $start_discount, $end_discount, $price, $quantity;
    public $prices = [] , $quantities = [] , $attributeValues = [];
    public $valueRowCount = 1;
    public $fullscreenImage = '';
    protected ProductService $productService;
    public function boot(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function mount($categories, $brands)
    {
        $this->categories = $categories;
        $this->brands = $brands;
    }
    public function render()
    {
        $attributes = Attribute::with('attributeValues')->get();
        return view('livewire.dashboard.create-product',compact('attributes'));
    }
    // protected function rules()
    // {
    //     return [
    // 'price' => ['required', 'numeric', 'min:1'],
    // 'quantity' => ['required', 'numeric', 'min:1'],
    // 'images.*' => ['required','image','mimes:jpeg,png,jpg,gif,bmp,webp,svg,ico,tiff','max:2048'],
    //       
    //     ];
    // }
    // public function updated()
    // {
    //     $this->validate();
    // }
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
            'product_tags'  => ['required', 'string'],
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
        if ($this->manage_stock == 1) {
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
            $data['attributeValues'] = ['required', 'array', 'min:1'];
            $data['attributeValues.*'] = ['required', 'array'];
            $data['attributeValues.*.*'] = ['required', 'integer','exists:attribute_values,id'];

        }
        $this->validate($data);
        $this->currentStep = 3;
    } 
    public function addNewVariant()
    {
        $this->prices[] = null;
        $this->quantities[] = null;
        $this->attributeValues[] = [];
        $this->valueRowCount = count($this->prices); // Keep count synchronized
    }
    public function removeVariant()
    {
        if($this->valueRowCount > 1){
            $this->valueRowCount--;
            array_pop($this->prices);
            array_pop($this->quantities);
            array_pop($this->attributeValues);
        }
    }
    public function deleteImage($key)
    {
        unset($this->images[$key]);
    }
    public function openFullscreen($key)
    {
        $this->fullscreenImage = $this->images[$key]->temporaryUrl();
        $this->dispatch('showFullscreenModal');
    }
    public function ThirdStepSubmit()
    {
        $this->validate([
            'images' => ['required', 'array'],
        ]);
        $this->currentStep = 4;
    }
    public function submitForm()
    {
        $product =[
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
            'product_tags' => $this->product_tags,
            'discount' => $this->has_discount == 0 ? null : $this->discount,
            'start_discount' => $this->has_discount == 0 ? null : $this->start_discount,
            'end_discount' => $this->has_discount == 0 ? null : $this->end_discount,
        ];
        $productVariants = [];
        if ($this->has_variants == 1) {
            foreach ($this->prices as $index => $price) {
                $productVariants[] = [
                    'product_id' => null,
                    'price' => $price,
                    'stock' => $this->quantities[$index] ?? 0,
                    'attribute_value_ids' => $this->attributeValues[$index],
                ];
                
            }
        }
        $this->productService->createProductWithDetails($product,$productVariants,$this->images);
        
        $this->successMessage = __('dashboard.product') . ' ' . __('dashboard.created_successfully');
        $this->resetExcept(['categories','brands','successMessage']);
        $this->currentStep = 1;
    }
}
