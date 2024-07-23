<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrequentlyQuestions extends Model
{
    use HasFactory, SoftDeletes;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}