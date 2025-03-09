<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['slug'];
    public function productTags()
    {
        return $this->hasMany(ProductTag::class,'tag_id');
    }
}
