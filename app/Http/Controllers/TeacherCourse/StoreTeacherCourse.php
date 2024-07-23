<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCourse\CreateTeacherRequest;
use App\Http\Resources\TeacherCourseResource;
use App\Repositories\TeacherCourseRepositoryInterface;
use Illuminate\Http\Request;

class StoreTeacherCourse extends Controller
{
    public function __invoke(CreateTeacherRequest $createTeacherRequest)
    {
        return TeacherCourseResource::make(
            app(TeacherCourseRepositoryInterface::class)->store(
                $createTeacherRequest->validated()
            )
        );
    }
}
