<?php

namespace App\Repositories;

interface ResponseRepositoryInterface
{
    public function store(array $data);

    public function update(array $data, int $responseId);

}
