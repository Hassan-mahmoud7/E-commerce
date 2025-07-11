<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'contacts';

    protected $fillable = ['name','email','phone','subject','message','is_read','is_starred','replay_status','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
