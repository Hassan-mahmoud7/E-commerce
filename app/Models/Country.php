<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Country extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name','phone_code','is_active'];
    public $timestamps = false;
}
