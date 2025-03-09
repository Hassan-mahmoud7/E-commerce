<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations, HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'small_desc',
        'desc',
        'sku',
        'available_for',
        'views',
        'status',

        'manage_stock',
        'quantity',
        'has_variants',
        'has_discount',
        'available_in_stock',
        'price',
        'discount',
        'start_discount',
        'end_discount',
        'category_id',
        'brand_id'
    ];
    protected $translatable = ['name', 'desc', 'small_desc'];
    protected $casts = [
        'price' => 'float',
        'discount' => 'float',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function productPreviews()
    {
        return $this->hasMany(ProductPreview::class, 'product_id');
    }
    public function productTags()
    {
        return $this->belongsToMany(productTag::class, 'product_tags', 'product_id', 'tag_id');
    }
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
    public function isSimple()
    {
        return !$this->has_variants;
    }
    public function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function getUpdateAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function priceAttribute()
    {
        return $this->has_variants == 0 ? number_format($this->price, 2) : __('dashboard.product_has_variants');
    }
    public function quantityAttribute()
    {
        // return $this->has_variants == 0 ? $this->quantity  : __('dashboard.product_has_variants');
        if ($this->has_variants == 0) {
            if ($this->manage_stock == 0) {
                return __('dashboard.product_out_of_stock');
            }
                return $this->quantity;
        }else{
            return __('dashboard.product_has_variants');
        }
    }
    // function
    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.not_active');
    }
    public function hasVariantstranslated()
    {
        return $this->has_variants == 1 ? __('dashboard.yes_variants') : __('dashboard.no_variants');
    }   
    // scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
}
