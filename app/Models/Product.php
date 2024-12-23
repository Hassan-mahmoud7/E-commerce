<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','small_desc', 'desc','sku', 'avilable_for', 'views','status','manage_stock', 'quantity',
         'avilable_in_stock', 'price', 'discount','start_discount', 'end_discount', 'category_id', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
