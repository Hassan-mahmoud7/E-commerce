<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = ['code', 'discount', 'discount_precentage', 'expire_at', 'limit', 'time_used', 'avilable','note'];
}
