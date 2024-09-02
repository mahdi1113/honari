<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCourseResource;
use App\Models\TeacherCourse;
use App\Repositories\TeacherCourseRepositoryInterface;
use App\Service\TeacherCourse\TeacherCourseService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexTeacherCourse extends Controller
{
    protected TeacherCourseService $teacherCourseService;
    public function __construct(TeacherCourseService $teacherCourseService)
    {
        $this->teacherCourseService = $teacherCourseService;
    }
    public function __invoke()
    {
        return TeacherCourseResource::collection(
            $this->teacherCourseService->getTeacherCourses()
        );
    }
}
