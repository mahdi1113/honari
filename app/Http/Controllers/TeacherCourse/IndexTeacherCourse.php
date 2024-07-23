<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCourseResource;
use App\Repositories\TeacherCourseRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexTeacherCourse extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return TeacherCourseResource::collection(
            app( TeacherCourseRepositoryInterface::class )->index()
        );
    }
}
