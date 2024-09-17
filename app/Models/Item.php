<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['topic', 'title', 'description', 'course_id', 'status', 'duration'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('videos')->singleFile();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
