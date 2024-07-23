<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\TeacherCourse;
use Illuminate\Support\Facades\Auth;

class TeacherCourseRepository
{
    public function index()
    {
        return TeacherCourse::with( "user" )->paginate();
    }
    public function store($data)
    {
        $TeacherCourse = TeacherCourse::query()->create( $data );
        return $TeacherCourse;
    }

    public function update( $data , $TeacherCourse )
    {
        $TeacherCourse = TeacherCourse::findOrFail( $TeacherCourse );
        $TeacherCourse->update( $data );

        $TeacherCourse->load( "user" );
        return $TeacherCourse;
    }

    public function destroy( $TeacherCourse )
    {
        $blog = TeacherCourse::findOrFail( $TeacherCourse );
        return $blog->delete();
    }
}
