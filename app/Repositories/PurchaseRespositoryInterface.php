<?php

namespace App\Repositories;

interface PurchaseRespositoryInterface
{
    public function destroy( int $purchasedCourseId );

    public function index();

    public function indexOnline();

    public function show( int $purchasedCourseId );

    public function similarBlogs( int $purchasedCourseId );

    public function showOnline( int $purchasedCourseId );

    public function store( array $data );

    public function storeOnline( array $data );

    public function update( array $data , int $purchasedCourseId );
}
