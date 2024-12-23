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
    protected $fillable = ['name', 'slug','status','parent'];
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
        if (Config('app.locale') == 'ar') {
            return $this->status == 1 ? 'مفعل' : 'غير مفعل' ;
        }else{
            return $this->status == 1 ? 'Active' : 'Not Active' ;
        }     
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
    public function ScoopeActive($query)
    {
        return $query->where('status', 1);
    } 
    public function ScoopeNotActive($query)
    {
        return $query->where('status', 0);
    } 

}
