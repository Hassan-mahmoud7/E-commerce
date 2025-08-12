<?php

namespace App\Livewire\Website\Cart;

use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public function removeProductFromCart($itemId)
    {
        if (auth('web')->check()) {
            $cartItem = auth('web')->user()->cart->cartItems()->find($itemId);
            if ($cartItem) {
                $cartItem->delete();
                $this->dispatch('refreshCart');
                $this->dispatch('message', __('website.product_removed_from_cart'));
            }else {
                return "";
            }
        }
    }
    #[On('refreshCart')]
    public function render()
    {
        $authUser = auth('web')->user();
        $cartCount = $authUser && auth('web')->check() ? $authUser->cart->cartItems->count() : 0;
        $cartitems = $authUser && auth('web')->check() ? $authUser->cart->cartItems()->latest()->limit(4)->get() : [];
        return view('livewire.website.cart.cart-icon', [
            'cartCount' => $cartCount,'cartitems' => $cartitems]);
    }
}
