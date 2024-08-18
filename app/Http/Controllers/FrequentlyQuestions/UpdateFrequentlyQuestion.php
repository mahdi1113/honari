<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentlyQuestions\UpdateFrequentlyQuestionsRequest;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use Illuminate\Http\Request;

class UpdateFrequentlyQuestion extends Controller
{
    public function __invoke( $frequentlyQuestions , UpdateFrequentlyQuestionsRequest $updateFrequentlyQuestionsRequest ): FrequentlyQuestionsResource
    {
        return FrequentlyQuestionsResource::make(
            app( FrequentlyQuestionsRepositoryInterface::class )->update(
                $updateFrequentlyQuestionsRequest->validated(),
                $frequentlyQuestions
            )
        );
    }
}
