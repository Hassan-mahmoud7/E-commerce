<?php

namespace App\Livewire\Website;

use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $variantId, $quantity, $price;
    public $priceAfterDiscount;
    public function mount($product)
    {
        $this->product    = $product;
        $this->variantId  = $product->productVariants->first()->id ?? null;
        $this->price      = $product->productVariants->first()->price ?? null;
        $this->priceAfterDiscount = $this->priceAfterDiscount();
        $this->quantity   = $product->productVariants && $product->has_variants == 1 ? $product->productVariants->first()->stock : $product->quantity;
    }
    public function changeVariant($variantId)
    {
        $variant = $this->product->productVariants->find($variantId);
        if (!$variant) {
            return response()->json(['message' =>'Invalid variant'],404);
        }
        $this->changePropertiesValues($variant);
    }
    public function changePropertiesValues($variant)
    {
        $this->variantId  = $variant->id;
        $this->price      = $variant->price;
        $this->priceAfterDiscount = $this->priceAfterDiscount();
        $this->quantity   = $variant->stock;
    }    
    public function priceAfterDiscount()
    {
           return  number_format($this->price - ($this->price * ($this->product->discount / 100)), 2);
    }
    public function render()
    {
        return view('livewire.website.product-details',[
            'variants' => $this->product->productVariants,
        ]);
    }
}
