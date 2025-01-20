<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasTranslations;

    protected $table = 'attributes';
    protected $fillable = ['name'];
    protected $translatable = ['name'];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class , 'attribute_id');
    }
    public Function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }

}
