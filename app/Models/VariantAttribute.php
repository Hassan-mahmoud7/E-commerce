<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    protected $table = 'variant_attributes';
    protected $fillable = ['product_variant_id', 'attribute_value_id'];
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
    public function attributeValue()
    {
        return $this->belongsTo(attributeValue::class, 'attribute_value_id');
    }
    
}
