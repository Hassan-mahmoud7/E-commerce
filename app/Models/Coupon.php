<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = ['code', 'discount_percentage', 'start_date', 'end_date', 'limit', 'time_used', 'status'];
    public function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function scopeValid($query)
    {
        return $query->where('status', 0)
                ->where('time_used', '<', 'limit')
                ->where('end_date', '>', now());
    }
    public function scopeNotValid($query)
    {
        return $query->where('status', 0)
                ->orWhere('time_used', '>=', 'limit')
                ->orWhere('end_date', '<', now());
    }
    public function couponIsValid()
    {
        return $this->status == 1 && $this->time_used < $this->limit && $this->end_date > now();
    }
    public function getStatusTranslated()
    {
        if (Config('app.locale') == 'ar') {
            return $this->status == 1 ? 'مفعل' : 'غير مفعل' ;
        }else{
            return $this->status == 1 ? 'Active' : 'Not Active' ;
        }     
    }
}
