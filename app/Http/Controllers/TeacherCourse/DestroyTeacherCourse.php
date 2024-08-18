<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Models\TeacherCourse;
use App\Repositories\Eloquent\TeacherCourseRepository;
use App\Service\Responser;
use App\Service\TeacherCourse\TeacherCourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyTeacherCourse extends Controller
{
    protected TeacherCourseService $teacherCourseService;

    public function __construct(TeacherCourseService $teacherCourseService)
    {
        $this->teacherCourseService = $teacherCourseService;
    }

    public function __invoke(TeacherCourse $teacherCourse): JsonResponse
    {
        $this->teacherCourseService->destroyTeacherCourse($teacherCourse->id);
        return response()->json(Responser::success());
    }
}
