<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexFrequentlyQuestion extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return FrequentlyQuestionsResource::collection(
            app( FrequentlyQuestionsRepositoryInterface::class )->index()
        );
    }
}
