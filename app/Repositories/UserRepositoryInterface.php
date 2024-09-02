<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function index();

    public function show(int $userId);

    public function showOnline();

    public function store(array $data);

    public function update(array $data, int $userId);

    public function destroy( int $userId );
}
