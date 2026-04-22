<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage;
use App\Models\Category;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'github_url',
        'live_url',
        'technologies',
        'is_featured',
        'content',
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}
public function images()
{
    return $this->hasMany(ProjectImage::class);
}
}
