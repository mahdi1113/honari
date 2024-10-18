<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Resources\CommentResource;
use App\Service\Comment\CommentService;
use Illuminate\Http\Request;

class IndexComment extends Controller
{
    protected CommentService $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function __invoke()
    {
        return CommentResource::collection(
            $this->commentService->getComments()
        );
    }
}
