<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Course\CourseService;
use Illuminate\Http\Request;

class StoreCourse extends Controller
{
    protected CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function __invoke( CreateCourseRequest $createCourseRequest )
    {
        return CourseResource::make(
            $this->courseService->createCourse()
        );
    }
}
