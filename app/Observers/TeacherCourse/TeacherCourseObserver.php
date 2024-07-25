<?php

namespace App\Observers\TeacherCourse;

use App\Models\TeacherCourse;

class TeacherCourseObserver
{
    /**
     * Handle the TeacherCourse "created" event.
     */
    public function created(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourse "updated" event.
     */
    public function updated(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourse "deleted" event.
     */
    public function deleted(TeacherCourse $teacherCourse): void
    {
        $teacherCourse->courses()->delete();
    }

    /**
     * Handle the TeacherCourse "restored" event.
     */
    public function restored(TeacherCourse $teacherCourse): void
    {
        //
    }

    /**
     * Handle the TeacherCourse "force deleted" event.
     */
    public function forceDeleted(TeacherCourse $teacherCourse): void
    {
        //
    }
}
