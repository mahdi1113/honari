<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\Purchase;
use App\Repositories\CourseRepositoryInterface;
use App\Service\MediaHelper;
use Illuminate\Support\Facades\Auth;

class CourseRepository implements CourseRepositoryInterface
{
    public function index()
    {
        return Course::with("frequentlyQuestions" )->paginate();
    }

    public function indexOnline()
    {
        return Course::paginate();
    }

    public function indexCourseUser()
    {
        $courseIds = Purchase::where('user_id', Auth::id())->pluck('course_id');
        $courses = Course::whereIn('id', $courseIds)->with("frequentlyQuestions" )->paginate();

        return $courses;
    }

    public function show( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "purchases", "purchases.user", "frequentlyQuestions", "items" );
        return $course;
    }

    public function showOnline( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "frequentlyQuestions", "items" );
        return $course;
    }

    public function showCourseUser( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "frequentlyQuestions" );
        return $course;
    }
    public function store(array $data)
    {
        $course = Course::query()->create( $data );
        MediaHelper::moveMediaTo( $course );

        return $course;
    }

    public function update( $data , $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->update( $data );
        MediaHelper::moveMediaTo( $course );

        return $course;
    }

    public function destroy( $courseId )
    {
        $courseId = Course::findOrFail( $courseId );
        return $courseId->delete();
    }
}
