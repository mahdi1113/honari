<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexCourse extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return CourseResource::collection(
            app( CourseRepositoryInterface::class )->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return CourseResource::collection(
            app( CourseRepositoryInterface::class )->indexOnline()
        );
    }
}
