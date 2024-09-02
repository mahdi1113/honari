<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function destroy( int $courseId );

    public function index();

    public function indexCourseUser();

    public function indexOnline();

    public function show( int $courseId );

    public function showOnline( int $courseId );

    public function showCourseUser( $courseId );

    public function store( array $data );

    public function update( array $data , int $courseId );
}
