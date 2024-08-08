<?php

namespace App\Repositories;

interface FrequentlyQuestionsRepositoryInterface
{
    public function destroy( int $frequentlyQuestions );

    public function index();

    public function show( int $frequentlyQuestions );

    public function store( array $data );

    public function update( array $data , int $frequentlyQuestions );
}
