<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Course\CourseService;
use Illuminate\Http\Request;

class UpdateCourse extends Controller
{
    protected CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function __invoke( Course $course , UpdateCourseRequest $updateCourseRequest ): CourseResource
    {
        return CourseResource::make(
            $this->courseService->updateCourse($course->id)
        );
    }
}
