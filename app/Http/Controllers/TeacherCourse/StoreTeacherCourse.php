<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCourse\CreateTeacherRequest;
use App\Http\Resources\TeacherCourseResource;
use App\Repositories\TeacherCourseRepositoryInterface;
use App\Service\TeacherCourse\TeacherCourseService;
use Illuminate\Http\Request;

class StoreTeacherCourse extends Controller
{
    protected TeacherCourseService $teacherCourseService;
    public function __construct(TeacherCourseService $teacherCourseService)
    {
        $this->teacherCourseService = $teacherCourseService;
    }
    public function __invoke(CreateTeacherRequest $createTeacherRequest)
    {
        return TeacherCourseResource::make(
            $this->teacherCourseService->createTeacherCourse()
        );
    }
}
