<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_name','small_desc','email', 'email_support','logo','favicon','social'];
}
