<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Country extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','phone_code','flag_code','status'];
    public $timestamps = false;
    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'country_id');
    }
}
