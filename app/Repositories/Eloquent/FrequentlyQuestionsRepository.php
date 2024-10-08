<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\FrequentlyQuestions;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;

class FrequentlyQuestionsRepository implements FrequentlyQuestionsRepositoryInterface
{
    public function index()
    {
        return FrequentlyQuestions::with("course")->paginate();
    }

    public function show($frequentlyQuestionsId)
    {
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        $frequentlyQuestions->load("course");
        return $frequentlyQuestions;
    }

    public function store($data)
    {
        $frequentlyQuestions = FrequentlyQuestions::query()->create($data);

        $frequentlyQuestions->load("course");
        return $frequentlyQuestions;
    }

    public function destroy($frequentlyQuestionsId)
    {
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        return $frequentlyQuestions->delete();
    }

    public function update($data, $frequentlyQuestionsId)
    {
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        $frequentlyQuestions->update($data);
        $frequentlyQuestions->load("course");

        return $frequentlyQuestions;
    }
}
