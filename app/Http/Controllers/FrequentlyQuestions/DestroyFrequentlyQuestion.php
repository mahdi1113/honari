<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyFrequentlyQuestion extends Controller
{
    public function __invoke( $frequentlyQuestions ): JsonResponse
    {
        app( FrequentlyQuestionsRepositoryInterface::class )->destroy( $frequentlyQuestions );
        return response()->json( Responser::success() );
    }
}
