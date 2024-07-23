<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherCourse extends Model
{
    protected $fillable = ['name', 'cv', 'evidence', 'user_id'];

    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
