<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;

class ShowCourse extends Controller
{
    public function __invoke( Course $course ): CourseResource
    {
        return CourseResource::make(
            app( CourseRepositoryInterface::class )->show( $course->id )
        );
    }

    public function show( Course $course ): CourseResource
    {
        return CourseResource::make(
            app( CourseRepositoryInterface::class )->showOnline( $course->id )
        );
    }
}
