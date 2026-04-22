<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'hero_title',
        'hero_subtitle',
        'about_text',
        'email',
        'phone',
        'github',
        'linkedin',
        'cv',
        'profile_image',
        'cv_file',
        'favicon',
    ];
}
