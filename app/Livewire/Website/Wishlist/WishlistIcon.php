<?php

namespace App\Livewire\Website\Wishlist;

use Livewire\Attributes\On;
use Livewire\Component;

class WishlistIcon extends Component
{
    #[On('wishlistUpdated')]
    public function render()
    {
        $wishlistCount = auth('web')->check() ? auth('web')->user()->wishlists()->count() : 0;
        return view('livewire.website.wishlist.wishlist-icon',['wishlistCount' => $wishlistCount]);
    }
}
