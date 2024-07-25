<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCourse\UpdateTeacherRequest;
use App\Http\Resources\TeacherCourseResource;
use App\Models\TeacherCourse;
use App\Repositories\TeacherCourseRepositoryInterface;
use Illuminate\Http\Request;

class UpdateTeacherCourse extends Controller
{
    public function __invoke(TeacherCourse $teacherCourse, UpdateTeacherRequest $UpdateTeacherRequest)
    {
        return TeacherCourseResource::make(
            app( TeacherCourseRepositoryInterface::class )->update(
                $UpdateTeacherRequest->validated(),
                $teacherCourse->id
            )
        );
    }
}
