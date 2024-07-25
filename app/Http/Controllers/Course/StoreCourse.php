<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;

class StoreCourse extends Controller
{
    public function __invoke( CreateCourseRequest $createCourseRequest )
    {
        return CourseResource::make(
            app(CourseRepositoryInterface::class)->store(
                $createCourseRequest->validated()
            )
        );
    }
}
