<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;

class UpdateCourse extends Controller
{
    public function __invoke( Course $course , UpdateCourseRequest $updateCourseRequest ): CourseResource
    {
        return CourseResource::make(
            app( CourseRepositoryInterface::class )->update(
                $updateCourseRequest->validated(),
                $course->id
            )
        );
    }
}
