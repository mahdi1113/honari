<?php

namespace App\Observers\TeacherCourse;

use App\Models\TeacherCourse;

class TeacherCourseObserver
{
    /**
     * Handle the TeacherCourseService "created" event.
     */
    public function created(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourseService "updated" event.
     */
    public function updated(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourseService "deleted" event.
     */
    public function deleted(TeacherCourse $teacherCourse): void
    {
        $teacherCourse->courses()->delete();
    }

    /**
     * Handle the TeacherCourseService "restored" event.
     */
    public function restored(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourseService "force deleted" event.
     */
    public function forceDeleted(TeacherCourse $teacherCourse): void
    {
        //
    }
}
