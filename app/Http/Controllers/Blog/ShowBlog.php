<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use App\Service\Blog\BlogService;
use Illuminate\Http\Request;

class ShowBlog extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function __invoke( Blog $blog ): BlogResource
    {
        return BlogResource::make(
            $this->blogService->getBlog($blog->id)
        );
    }

    public function show( Blog $blog ): BlogResource
    {
        return BlogResource::make(
            $this->blogService->getBlogOnline($blog->id)
        );
    }
}
