<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentlyQuestions\CreateFrequentlyQuestionsRequest;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\FrequentlyQuestion\FrequentlyQuestionService;
use Illuminate\Http\Request;

class StoreFrequentlyQuestion extends Controller
{
    protected FrequentlyQuestionService $frequentlyQuestionService;
    public function __construct(FrequentlyQuestionService $frequentlyQuestionService)
    {
        $this->frequentlyQuestionService = $frequentlyQuestionService;
    }

    public function __invoke( CreateFrequentlyQuestionsRequest $createFrequentlyQuestionsRequest )
    {
        return FrequentlyQuestionsResource::make(
            $this->frequentlyQuestionService->createFrequentlyQuestion()
        );
    }
}
