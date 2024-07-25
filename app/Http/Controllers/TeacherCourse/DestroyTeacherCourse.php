<?php

namespace App\Http\Controllers\TeacherCourse;

use App\Http\Controllers\Controller;
use App\Models\TeacherCourse;
use App\Repositories\Eloquent\TeacherCourseRepository;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyTeacherCourse extends Controller
{
        public function __invoke( TeacherCourse $teacherCourse ): JsonResponse
    {
        app( TeacherCourseRepository::class )->destroy( $teacherCourse->id );
        return response()->json( Responser::success() );
    }
}
