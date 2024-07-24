<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyCourse extends Controller
{
    public function __invoke( Course $course ): JsonResponse
    {
        app( CourseRepositoryInterface::class )->destroy( $course->id );
        return response()->json( Responser::success() );
    }
}
