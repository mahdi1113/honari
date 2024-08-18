<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\FrequentlyQuestions;

class FrequentlyQuestionsRepository
{
    public function index()
    {
        return FrequentlyQuestions::with("course")->paginate();
    }

    public function show($frequentlyQuestionsId)
    {
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        $frequentlyQuestions->load("course");
        return $frequentlyQuestions;
    }

    public function store($data)
    {
        $course = Course::findOrFail($data['course_id']);
        $hasCourse = $course->frequentlyQuestions()->exists();

        if ($hasCourse) {
            return [
                'message' => 'برای این دوره قبلا سوالات متداول ثبت شده است، فقط می توانید سوالات متداول این دوره را آپدیت کنید.'
            ];
        } else {
            $frequentlyQuestions = FrequentlyQuestions::query()->create($data);

            $frequentlyQuestions->load("course");
            return $frequentlyQuestions;
        }
    }

    public function destroy($frequentlyQuestionsId)
    {
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        return $frequentlyQuestions->delete();
    }

    public function update($data, $frequentlyQuestionsId)
    {

        $course = Course::findOrFail($data['course_id']);
        $frequentlyQuestions = FrequentlyQuestions::findOrFail($frequentlyQuestionsId);
        $hasCourse = $course->frequentlyQuestions()->exists();

        if ( $data['course_id'] != $frequentlyQuestions->course_id && $hasCourse ) {
            return [
                'message' => 'برای این دوره قبلا سوالات متداول ثبت شده است'
            ];
        } else {
            $frequentlyQuestions->update($data);

            $frequentlyQuestions->load("course");
            return $frequentlyQuestions;
        }

    }
}
