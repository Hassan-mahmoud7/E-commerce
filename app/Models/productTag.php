<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productTag extends Model
{
    protected $table="product_tags"; 
    protected $fillable = ['product_id', 'tag_id'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
