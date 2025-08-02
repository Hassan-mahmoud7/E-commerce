<?php

namespace App\Livewire\Website\Wishlist;

use Livewire\Component;
use App\Models\Wishlist as WishlistModel;

class Wishlist extends Component
{
    public $product;
    public $inWishlist = false;
    public function mount($product)
    {
        $this->product = $product;

        if (!auth('web')->check()) {
            $this->inWishlist = false;
            return;
        }
        $status = WishlistModel::where('product_id', $product->id)
            ->where('user_id', auth('web')->user()->id)->first();

        $this->inWishlist = $status ? true : false;
    }
    public function addToWishlist($productId)
    {
        if (!auth('web')->check()) {
            session(['url.intended' => url()->previous()]);
            return redirect()->route('website.login');
        }
        WishlistModel::create([
            'product_id' => $productId,
            'user_id' => auth('web')->user()->id,
        ]);
        $this->inWishlist = true;
        $this->dispatch('addedToWishlist', __('website.added_to_wishlist_successfully'));
        $this->dispatch('wishlistUpdated');
        return;
    }
    public function removeFromWishlist($productId)
    {
        if (!auth('web')->check()) {
            session(['url.intended' => url()->previous()]);
            return redirect()->route('website.login');
        }
        WishlistModel::where('product_id', $productId)
            ->where('user_id', auth('web')->user()->id)
            ->delete();
        $this->inWishlist = false;
        $this->dispatch('removedFromWishlist', __('website.removed_from_wishlist_successfully'));
        $this->dispatch('wishlistUpdated');
        return;
    }
    public function render()
    {
        return view('livewire.website.wishlist.wishlist');
    }
}
