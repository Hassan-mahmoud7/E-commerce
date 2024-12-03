<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password','role_id'];
  
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function hasAccess($Config_permission)
    {
        $role = $this->role;
        if (!$role) {
            return false;
        }
        foreach ($role->permission as $permission) {
            if ($Config_permission == $permission ?? false) {
                return true;
            }
        }
    }
}
