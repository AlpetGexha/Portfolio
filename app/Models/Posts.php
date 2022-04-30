<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Posts extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'views', 'status', 'categorys'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorys()
    {
        return $this->belongsToMany(Categorys::class, 'post_categorys');
    }

    // media collection
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('posts')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb');
    }

    protected $casts = [
        'categorys' => 'array'
    ];
}
