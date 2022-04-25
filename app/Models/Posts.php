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

    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'views', 'status',
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
            ->addMediaCollection('post')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb');
    }
}
