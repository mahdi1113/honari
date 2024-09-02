<?php

namespace App\Observers\TeacherCourse;

use App\Models\TeacherCourse;

class TeacherCourseObserver
{
    public function deleted(TeacherCourse $teacherCourse): void
    {
        $teacherCourse->courses()->delete();
    }

}
