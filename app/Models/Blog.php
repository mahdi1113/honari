<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;


class Blog extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'user_id'];

    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files')->singleFile();
    }

    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('article-image')
            ->width(800)
            ->height(600)
            ->nonQueued()
            ->performOnCollections('files');


        $this->addMediaConversion('thumbnail')
            ->width(400)
            ->height(300)
            ->nonQueued()
            ->performOnCollections('files');
    }
}
