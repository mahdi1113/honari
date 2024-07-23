<?php

namespace App\Repositories;

interface TeacherCourseRepositoryInterface
{
    public function destroy( int $TeacherCourse );

    public function index();

    public function indexOnline();

    public function similarBlogs( int $TeacherCourse );

    public function store( array $data );

    public function update( array $data , int $TeacherCourse );
}
