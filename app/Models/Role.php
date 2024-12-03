<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $fillable = ['role', 'permission'];
    public $translatable = ['role'];

    public function getPermissionAttribute($permission)
    {
        return  json_decode($permission);
    }
    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
    
}
