<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrequentlyQuestions\CreateFrequentlyQuestionsRequest;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use Illuminate\Http\Request;

class StoreFrequentlyQuestion extends Controller
{
    public function __invoke( CreateFrequentlyQuestionsRequest $createFrequentlyQuestionsRequest )
    {
        return FrequentlyQuestionsResource::make(
            app(FrequentlyQuestionsRepositoryInterface::class)->store(
                $createFrequentlyQuestionsRequest->validated()
            )
        );
    }
}
