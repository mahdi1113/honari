<?php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function store( $data );

    public function show( int $itemId );

    public function showOnline( int $itemId );

    public function update( int $itemId, $data );

    public function destroy( int $itemId );
}
