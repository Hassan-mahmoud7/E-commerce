<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'image',
        'city_id',
        'country_id',
        'governorate_id',

    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }
    public function productPreviews()
    {
        return $this->hasMany(ProductPreview::class,'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');        
    }
    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.not_active');
    }
    public function getCreatedAtAttribute($created)
    {
        return date('d/m/Y h:m A', strtotime($created));
    }
    public function getEmailVerifiedAtAttribute($value)
    {
        return date('d/m/Y h:m A', strtotime($value));
    }
    public function user($value)
    {
        return date('d/m/Y h:m A', strtotime($value));
    }
}
