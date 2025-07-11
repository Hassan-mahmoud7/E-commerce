<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory , HasTranslations;

    protected $table = 'faqs';
    protected $fillable = ['question', 'answer'];
    protected $translatable = ['question','answer'];
    public $timestamps = false;
}
