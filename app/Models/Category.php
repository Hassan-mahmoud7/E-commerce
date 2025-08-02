<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use PSpell\Config;

class Category extends Model
{
    use HasTranslations , Sluggable;
    protected $table = 'categories';
    protected $fillable = ['id','name', 'slug','status','parent','image'];
    protected $translatable = ['name'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.not_active') ;    
    }
    public Function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent');
    }
    public function children()
    {
        return $this->hasMany(Category::class , 'parent');
    }
    public function ScopeActive($query)
    {
        return $query->where('status', 1);
    } 
    public function ScopeNotActive($query)
    {
        return $query->where('status', 0);
    } 
    public function getImageAttribute($image)
    {
        return asset('assets/img/uploads/categories/' . $image);
    }

}
