<?php

namespace App\Repositories;

interface CommentRepositoryInterface
{
    public function index();

    public function show( int $commentId );

    public function storeOnline( array $data );

    public function updateStatus( array $data , int $commentId );
}
