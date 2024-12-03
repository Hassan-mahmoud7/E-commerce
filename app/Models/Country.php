<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Country extends Model
{
    protected $fillable = ['name'];
    public $timestamp = false;
}
