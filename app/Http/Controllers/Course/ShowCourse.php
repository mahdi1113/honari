<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Course\CourseService;
use Illuminate\Http\Request;

class ShowCourse extends Controller
{
    protected CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function __invoke( Course $course ): CourseResource
    {
        return CourseResource::make(
            $this->courseService->getCourse($course->id)
        );
    }

    public function show( Course $course ): CourseResource
    {
        return CourseResource::make(
            $this->courseService->getCourseOnline($course->id)
        );
    }
}
