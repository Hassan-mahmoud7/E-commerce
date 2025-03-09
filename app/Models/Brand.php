<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
    use HasTranslations , Sluggable;
    protected $table = 'brands';
    protected $fillable = ['name', 'logo','slug','status'];
    protected $translatable = ['name'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
    public Function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.not_active') ;    
    }
    public function products()
    {
        return $this->hasMany(Product::class , 'brand_id');
    }
    public function ScoopeActive($query)
    {
        return $query->where('status', 1);
    } 
    public function ScoopeNotActive($query)
    {
        return $query->where('status', 0);
    } 
    public function getLogoAttribute($logo)
    {   
        if (stripos($logo,'http') !== false) {
           return $logo;
        }
        return 'assets/img/uploads/brands/'. $logo;
    }
}
