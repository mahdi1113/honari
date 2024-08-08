<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'price', 'duration_course', 'method_holding'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function frequentlyQuestions()
    {
        return $this->hasOne(FrequentlyQuestions::class);
    }

//    public function users()
//    {
//        return $this->belongsToMany(User::class)->withTimestamps();
//    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(TeacherCourse::class, 'course_teachers','course_id','teacher_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
