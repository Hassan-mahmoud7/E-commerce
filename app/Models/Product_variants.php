<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_variants extends Model
{
    protected $table = 'product_variants';
    protected $fillable = ['product_id', 'price','stock'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
