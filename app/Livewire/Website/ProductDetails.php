<?php

namespace App\Livewire\Website;

use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $variantId, $quantity, $price;
    public $priceAfterDiscount;
    public int $cartQuantity = 1;
    public $cartAttributesArray = [];
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
            return response()->json(['message' => 'Invalid variant'], 404);
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
    public function addToCartQuantity()
    {
        $this->cartQuantity++;
    }
    public function removeFromCartQuantity()
    {
        if ($this->cartQuantity > 1) {
            $this->cartQuantity--;
        }
    }
    public function addToCart()
    {
        if (!auth('web')->check()) {
            session(['url.intended' => url()->previous()]);
            return redirect()->route('website.login');
        }
        $cart = Cart::firstOrCreate(['user_id' => auth('web')->user()->id]);

        if ($this->product->has_variants) {
            $variant = $this->product->productVariants->find($this->variantId);
            $variant->load('variantAttributes');

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_variant_id', $variant->id)
                ->first();

            if ($cartItem) {
                if ($cartItem->quantity + $this->cartQuantity > $variant->stock) {
                    return $this->dispatch('errorMessage', __('website.over_quantity'));
                } else {
                    $cartItem->increment('quantity', $this->cartQuantity);
                }
            } else {

                if ($this->cartQuantity > $variant->stock) {
                    return $this->dispatch('errorMessage', __('website.over_quantity'));
                } else {
                    foreach ($variant->variantAttributes as  $variantAttribute) {
                        $this->cartAttributesArray[$variantAttribute->attributeValue->attribute->name] = $variantAttribute->attributeValue->value;
                    }

                    if ($this->product->has_discount) {
                        $price = number_format($variant->price - ($variant->price * ($this->product->discount / 100)), 2);
                    }
                    $cart->cartItems()->create([
                        'quantity' => $this->cartQuantity,
                        'price' => $price ?? $this->price,
                        'product_id' => $this->product->id,
                        'product_variant_id' => $variant->id,
                        'attributes' => json_encode($this->cartAttributesArray, JSON_UNESCAPED_UNICODE),
                    ]);
                }
            }
        } else {
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $this->product->id)
                ->whereNull('product_variant_id')
                ->first();
            if ($cartItem) {
                if ($cartItem->quantity + $this->cartQuantity >= $this->product->quantity) {
                    return $this->dispatch('errorMessage', __('website.over_quantity'));
                }
                $cartItem->increment('quantity', $this->cartQuantity);
            } else {
                if ($this->cartQuantity > $this->product->quantity) {
                    $this->dispatch('errorMessage', __('website.over_quantity'));
                } else {
                    $cart->cartItems()->create([
                        'quantity' => $this->cartQuantity,
                        'price' => $this->product->getPriceAfterDiscount(),
                        'product_id' => $this->product->id,
                        'product_variant_id' => null,
                    ]);
                }
            }
        }

        $this->dispatch('successMessage', __('website.added_to_cart_successfully'));
        $this->dispatch('refreshCart');
        $this->cartQuantity = 1;
    }
    public function render()
    {
        return view('livewire.website.product-details', [
            'variants' => $this->product->productVariants,
        ]);
    }
}
