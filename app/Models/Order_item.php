<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_quantity','product_price','product_data'];
}
