<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasTranslations;
    protected $table = 'sliders';
    public $translatable = ['note'];
    protected $fillable = ['id','file_name', 'note'];
    
    public function getFileNameAttribute($file_name)
    {
        return '/assets/img/uploads/sliders/' . $file_name;
    }
    public function getCreatedAtAttribute()
    {
        return date('d-m-Y H:i a', strtotime($this->attributes['created_at'])); ;
    }
    
}
