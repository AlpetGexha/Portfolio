<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Portofilo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTags;

    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'views', 'status', 'url', 'data_created'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // media collection
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('portofilo');
            // ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(415)
            ->height(220);


        $this->addMediaConversion('test')
            ->width(1280)
            ->height(1024);
    }

    public function scopeGetImg($query)
    {
        return $query->getMedia('portofilo')->first()->getUrl();
    }
}
