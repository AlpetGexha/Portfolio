<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Aboutme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'profile', 'email', 'phone', 'body',  'skills', 'socials', 'services', 'facts'
    ];

    protected $casts = [
        'skills' => 'array',
        'socials' => 'array',
        'services' => 'array',
        'facts' => 'array',
    ];

}
