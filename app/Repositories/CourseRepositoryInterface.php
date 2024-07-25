<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function destroy( int $courseId );

    public function index();

    public function indexOnline();

    public function show( int $courseId );

    public function similarBlogs( int $courseId );

    public function showOnline( int $courseId );

    public function store( array $data );

    public function update( array $data , int $courseId );
}
