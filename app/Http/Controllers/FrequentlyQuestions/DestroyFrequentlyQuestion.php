<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\FrequentlyQuestion\FrequentlyQuestionService;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyFrequentlyQuestion extends Controller
{
    protected FrequentlyQuestionService $frequentlyQuestionService;
    public function __construct(FrequentlyQuestionService $frequentlyQuestionService)
    {
        $this->frequentlyQuestionService = $frequentlyQuestionService;
    }
    public function __invoke( $frequentlyQuestions ): JsonResponse
    {
        $this->frequentlyQuestionService->destroyFrequentlyQuestion($frequentlyQuestions);
        return response()->json( Responser::success() );
    }
}
