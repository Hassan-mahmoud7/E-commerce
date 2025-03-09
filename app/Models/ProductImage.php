<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['file_name', 'file_type', 'file_size','product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
