<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $table = 'settings';
    protected $fillable = [
        'site_name',
        'small_desc',
        'email',
        'email_support',
        'phone',
        'address',
        'logo',
        'favicon',
        'meta_desc',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'site_copyright',
        'promotion_video_url',
    ];
    public $translatable = [ 'site_name','address','small_desc', 'meta_desc'];
    public function getLogoAttribute($logo)
    {
        return '/assets/img/uploads/settings/'. $logo;
    }
    public function getFaviconAttribute($favicon)
    {
        return '/assets/img/uploads/settings/'. $favicon;
    }
}
