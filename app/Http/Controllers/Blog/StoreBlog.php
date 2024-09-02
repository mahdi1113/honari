<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepositoryInterface;
use App\Service\Blog\BlogService;
use Illuminate\Http\Request;

class StoreBlog extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function __invoke( CreateBlogRequest $createBlogRequest )
    {
        return BlogResource::make(
            $this->blogService->createBlog()
        );
    }
}
