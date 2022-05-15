<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Categorys extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTags;


    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'status', 'views',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_categorys');
    }

    // media collection
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('category')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(415)
            ->height(220);
    }
}
