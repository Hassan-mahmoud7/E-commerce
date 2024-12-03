<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_variants extends Model
{
    protected $fillable = ['product_id','size', 'price','quantity'];
}
