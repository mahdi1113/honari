<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'price', 'duration_course', 'method_holding', 'num_student', 'teacher_name'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function frequentlyQuestions()
    {
        return $this->hasMany(FrequentlyQuestions::class);
    }

//    public function users()
//    {
//        return $this->belongsToMany(User::class)->withTimestamps();
//    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

//    public function teachers()
//    {
//        return $this->belongsToMany(TeacherCourse::class, 'course_teachers','course_id','teacher_id');
//    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files')->singleFile();
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function buyers()
    {
        return $this->belongsToMany(User::class, 'purchases')->withTimestamps();
    }
}
