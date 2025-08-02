<?php

namespace App\Livewire\Website\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistTable extends Component
{

    public function destroy($productId)
    {
        $wishlist = Wishlist::where('product_id', $productId)->where('user_id',auth('web')->user()->id)->first();
        
        if ($wishlist == null) {
            $this->dispatch('failded', 'failed 404');
        }else{
            $wishlist->delete();
            $this->dispatch('removedFromWishlist', __('website.removed_from_wishlist_successfully'));
            $this->dispatch('wishlistUpdated');
        } 
    }
    public function clearWishlist()
    {
        $wishlists = Wishlist::where('user_id', auth('web')->user()->id)->get();
        if ($wishlists->isEmpty()) {
            $this->dispatch('failded', 'failed 404');
        } else {
           auth('web')->user()->wishlists()->delete();
            $this->dispatch('removedFromWishlist', __('website.wishlist_cleared_successfully'));
            $this->dispatch('wishlistUpdated');
        }
    }
    public function render()
    {
        return view('livewire.website.wishlist.wishlist-table',[
            'wishlists' => Wishlist::where('user_id', auth('web')->user()->id)->with('product')->get()
        ]);
    }
}
