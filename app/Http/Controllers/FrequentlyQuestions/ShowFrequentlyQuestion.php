<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Models\FrequentlyQuestions;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\FrequentlyQuestion\FrequentlyQuestionService;
use Illuminate\Http\Request;

class ShowFrequentlyQuestion extends Controller
{
    protected FrequentlyQuestionService $frequentlyQuestionService;
    public function __construct(FrequentlyQuestionService $frequentlyQuestionService)
    {
        $this->frequentlyQuestionService = $frequentlyQuestionService;
    }
    public function __invoke( $frequentlyQuestion ): FrequentlyQuestionsResource
    {
        return FrequentlyQuestionsResource::make(
            $this->frequentlyQuestionService->getFrequentlyQuestion($frequentlyQuestion)
        );
    }
}
