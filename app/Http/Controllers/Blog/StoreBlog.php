<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

class StoreBlog extends Controller
{
    public function __invoke( CreateBlogRequest $createBlogRequest )
    {
        return BlogResource::make(
            app(BlogRepositoryInterface::class)->store(
                $createBlogRequest->validated()
            )
        );
    }
}
