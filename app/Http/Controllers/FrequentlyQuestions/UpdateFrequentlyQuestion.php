<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentlyQuestions\UpdateFrequentlyQuestionsRequest;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\FrequentlyQuestion\FrequentlyQuestionService;
use Illuminate\Http\Request;

class UpdateFrequentlyQuestion extends Controller
{
    protected FrequentlyQuestionService $frequentlyQuestionService;
    public function __construct(FrequentlyQuestionService $frequentlyQuestionService)
    {
        $this->frequentlyQuestionService = $frequentlyQuestionService;
    }
    public function __invoke( $frequentlyQuestions , UpdateFrequentlyQuestionsRequest $updateFrequentlyQuestionsRequest ): FrequentlyQuestionsResource
    {
        return FrequentlyQuestionsResource::make(
            $this->frequentlyQuestionService->updateFrequentlyQuestion($frequentlyQuestions)
        );
    }
}
