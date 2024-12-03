<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['note', 'name', 'email','phone', 'street',
                          'price','shipping_price', 'total_price', 'status', 'country ','city', 'governorate', 'user_id'];
}
