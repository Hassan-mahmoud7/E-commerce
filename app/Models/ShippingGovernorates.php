<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingGovernorates extends Model
{
    protected $table = 'shipping_governorates';
    protected $fillable = ['price','governorate_id'];
    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }
}
