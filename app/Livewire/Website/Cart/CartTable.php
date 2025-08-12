<?php

namespace App\Livewire\Website\Cart;

use App\Models\CartItem;
use Livewire\Component;
use Livewire\Attributes\On;

class CartTable extends Component
{
    public function cleanAllProduct()
    {
        if (auth('web')->check()) {
            $cartItems = auth('web')->user()->cart->cartItems();
            if ($cartItems) {
                $cartItems->delete();
                $this->dispatch('refreshCart');
                $this->dispatch('message', __('website.cart_cleared_successfully'));
            }
        }
    }
    public function plusQuantity($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item) {
            $item->quantity++;
            $item->save();
        }
        
    }
    public function minusQuantity($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item && $item->quantity > 1) {
            $item->quantity--;
            $item->save();
        }
    }
    public function removeProductFromCart($itemId)
    {
        $authUser = auth('web')->user();
        if ($authUser) {
            $cartItem = $authUser->cart->cartItems()->find($itemId);
            if ($cartItem) {
                $cartItem->delete();
                $this->dispatch('refreshCart');
                $this->dispatch('message', __('website.product_removed_from_cart'));
            } else {
                return "";
            }
        }
    }
    #[On('refreshCart')]
    public function render()
    {
        return view('livewire.website.cart.cart-table', [
            'cartItems' => auth('web')->user() ? auth('web')->user()->cart->cartItems : [],
        ]);
    }
}
