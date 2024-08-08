<?php

namespace App\Http\Controllers\FrequentlyQuestions;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrequentlyQuestionsResource;
use App\Models\FrequentlyQuestions;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use Illuminate\Http\Request;

class ShowFrequentlyQuestion extends Controller
{
    public function __invoke( $frequentlyQuestion ): FrequentlyQuestionsResource
    {
        return FrequentlyQuestionsResource::make(
            app( FrequentlyQuestionsRepositoryInterface::class )->show( $frequentlyQuestion )
        );
    }
}
