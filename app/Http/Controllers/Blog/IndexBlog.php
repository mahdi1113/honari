<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexBlog extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            app( BlogRepositoryInterface::class )->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            app( BlogRepositoryInterface::class )->indexOnline()
        );
    }

}
