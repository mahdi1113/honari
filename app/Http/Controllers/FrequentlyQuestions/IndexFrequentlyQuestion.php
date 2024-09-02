<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\FrequentlyQuestion\FrequentlyQuestionService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexFrequentlyQuestion extends Controller
{
    protected FrequentlyQuestionService $frequentlyQuestionService;
    public function __construct(FrequentlyQuestionService $frequentlyQuestionService)
    {
        $this->frequentlyQuestionService = $frequentlyQuestionService;
    }
    public function __invoke(): AnonymousResourceCollection
    {
        return FrequentlyQuestionsResource::collection(
            $this->frequentlyQuestionService->getFrequentlyQuestions()
        );
    }
}
