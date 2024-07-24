<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;

class CourseRepository
{
    public function index()
    {
        return Course::with( "teachers" , "teachers.user" )->paginate();
    }

    public function indexOnline()
    {
        return Course::with( "teachers" )->paginate();
    }

    public function show( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "teachers" , "teachers.user");
        return $course;
    }

    public function showOnline( $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->load( "teachers" );
        return $course;
    }
    public function store(array $data)
    {
        $course = Course::query()->create( $data );
        $course->teachers()->attach($data['course_teacher_id']);

        $course->load('teachers','teachers.user');
        return $course;
    }

    public function update( $data , $courseId )
    {
        $course = Course::findOrFail( $courseId );
        $course->update( $data );
        $course->teachers()->sync($data['course_teacher_id']);

        $course->load( "teachers", "teachers.user" );
        return $course;
    }

    public function destroy( $courseId )
    {
        $courseId = Course::findOrFail( $courseId );
        return $courseId->delete();
    }
}
