<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Course\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexCourse extends Controller
{
    protected CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function __invoke(): AnonymousResourceCollection
    {
        return CourseResource::collection(
            $this->courseService->getCourses()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return CourseResource::collection(
            $this->courseService->getCoursesOnline()
        );
    }
}
