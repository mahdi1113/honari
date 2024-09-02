<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepositoryInterface;
use App\Service\Blog\BlogService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexBlog extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function __invoke(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            $this->blogService->getBlogs()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            $this->blogService->getBlogsOnline()
        );
    }

}
