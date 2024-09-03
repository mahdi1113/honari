<?php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function store( $data );

    public function show( int $itemId );

    public function showOnline( int $itemId );
}
