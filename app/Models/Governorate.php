<?php

namespace App\Models;

use App\Models\ShippingGovernorates;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','status','country_id'];
    public $timestamps = false;
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }
    public function shippingPrice()
    {
        return $this->hasOne(ShippingGovernorates::class, 'governorate_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'governorate_id');
    }

}
