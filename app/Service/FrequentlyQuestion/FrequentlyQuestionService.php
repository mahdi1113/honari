<?php

namespace App\Service\FrequentlyQuestion;

use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use Illuminate\Http\Request;

class FrequentlyQuestionService
{
    public function __construct(
        readonly FrequentlyQuestionsRepositoryInterface $frequentlyQuestionsRepositoryInterface,
        readonly Request $request
    ){}
    public function getFrequentlyQuestions()
    {
        return $this->frequentlyQuestionsRepositoryInterface->index();
    }

    public function getFrequentlyQuestionsOnline()
    {
        return $this->frequentlyQuestionsRepositoryInterface->indexOnline();
    }

    public function getFrequentlyQuestion(int $id)
    {
        return $this->frequentlyQuestionsRepositoryInterface->show($id);
    }

    public function getFrequentlyQuestionOnline(int $id)
    {
        return $this->frequentlyQuestionsRepositoryInterface->showOnline($id);
    }

    public function createFrequentlyQuestion()
    {
        return $this->frequentlyQuestionsRepositoryInterface->store($this->data());
    }

    public function updateFrequentlyQuestion(int $id)
    {
        return $this->frequentlyQuestionsRepositoryInterface->update($this->data(), $id);
    }

    public function destroyFrequentlyQuestion(int $id)
    {
        return $this->frequentlyQuestionsRepositoryInterface->destroy($id);
    }

    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'course_id' => $this->request->get('course_id'),
        ];

        return $data;
    }
}
