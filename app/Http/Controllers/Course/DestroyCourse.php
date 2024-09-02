<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Course\CourseService;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyCourse extends Controller

{
    protected CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function __invoke( Course $course ): JsonResponse
    {
        $this->courseService->destroyCourse($course->id);
        return response()->json( Responser::success() );
    }
}
