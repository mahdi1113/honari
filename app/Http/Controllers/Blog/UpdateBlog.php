<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

class UpdateBlog extends Controller
{
    public function __invoke( Blog $blog , UpdateBlogRequest $updateBlogRequest ): BlogResource
    {
        return BlogResource::make(
            app( BlogRepositoryInterface::class )->update(
                $updateBlogRequest->validated(),
                $blog->id
            )
        );
    }
}
