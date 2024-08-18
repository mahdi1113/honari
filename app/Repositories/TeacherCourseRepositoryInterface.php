<?php

namespace App\Repositories;

interface TeacherCourseRepositoryInterface
{
    public function destroy( int $TeacherCourse );

    public function index();


    public function store( array $data );

    public function update( array $data , int $TeacherCourse );
}
