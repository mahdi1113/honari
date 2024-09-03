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
        return Course::with( "teachers" , "teachers.user", "frequentlyQuestions" )->paginate();
    }

    public function indexOnline()
    {
        return Course::with('teachers')->paginate();
    }

    public function indexCourseUser()
    {
        $courseIds = Purchase::where('user_id', Auth::id())->pluck('course_id');
        $courses = Course::whereIn('id', $courseIds)->with('teachers', "frequentlyQuestions" )->paginate();

        return $courses;
    }

    public function show( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "teachers" , "teachers.user", "purchases", "purchases.user", "frequentlyQuestions", "items" );
        return $course;
    }

    public function showOnline( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "teachers", "frequentlyQuestions", "items" );
        return $course;
    }

    public function showCourseUser( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "teachers", "frequentlyQuestions" );
        return $course;
    }
    public function store(array $data)
    {
        $course = Course::query()->create( $data );
        $course->teachers()->attach($data['course_teacher_id']);

        MediaHelper::moveMediaTo( $course );

        $course->load('teachers','teachers.user');
        return $course;
    }

    public function update( $data , $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->update( $data );
        $course->teachers()->sync($data['course_teacher_id']);

        MediaHelper::moveMediaTo( $course );

        $course->load( "teachers", "teachers.user" );
        return $course;
    }

    public function destroy( $courseId )
    {
        $courseId = Course::findOrFail( $courseId );
        return $courseId->delete();
    }
}
