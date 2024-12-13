<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','status','governorate_id'];
    public $timestamps = false;
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
    public function users()
    {
        return $this->hasMany(User::class , 'city_id');
    }
}
