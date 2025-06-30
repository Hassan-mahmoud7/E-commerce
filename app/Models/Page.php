<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use  HasTranslations;

    protected $table = 'pages';
    protected $fillable = ['id', 'title', 'slug', 'status', 'content', 'image'];

    protected $translatable = ['title', 'content'];

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }
    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.not_active');
    }
    // public function getImageAttribute($value)
    // {
    //     return asset('assets/img/uploads/pages/' . $value);
    // }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
