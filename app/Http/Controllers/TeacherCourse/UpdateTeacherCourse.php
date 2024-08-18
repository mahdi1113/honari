<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCourse\UpdateTeacherRequest;
use App\Http\Resources\TeacherCourseResource;
use App\Models\TeacherCourse;
use App\Repositories\TeacherCourseRepositoryInterface;
use App\Service\TeacherCourse\TeacherCourseService;
use Illuminate\Http\Request;

class UpdateTeacherCourse extends Controller
{
    protected TeacherCourseService $teacherCourseService;
    public function __construct(TeacherCourseService $teacherCourseService)
    {
        $this->teacherCourseService = $teacherCourseService;
    }
    public function __invoke(TeacherCourse $teacherCourse, UpdateTeacherRequest $UpdateTeacherRequest)
    {
        return TeacherCourseResource::make(
            $this->teacherCourseService->updateTeacherCourse($teacherCourse->id)
        );
    }
}
