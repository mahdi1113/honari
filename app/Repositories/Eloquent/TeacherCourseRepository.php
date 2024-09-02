<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\TeacherCourse;
use App\Repositories\TeacherCourseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TeacherCourseRepository implements TeacherCourseRepositoryInterface
{
    public function index()
    {
        return TeacherCourse::with( ["user" , "courses"] )->paginate();
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
        $TeacherCourse = TeacherCourse::findOrFail( $TeacherCourse );
        return $TeacherCourse->delete();
    }
}
