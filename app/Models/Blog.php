<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
}
