<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use App\Service\Blog\BlogService;
use App\Service\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyBlog extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function __invoke( Blog $blog ): JsonResponse
    {
        $this->blogService->destroyBlog($blog->id);
        return response()->json( Responser::success() );
    }
}
