<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Service\Comment\CommentService;
use Illuminate\Http\Request;

class ShowComment extends Controller
{
    protected CommentService $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function __invoke( Comment $comment )
    {
        return CommentResource::make(
            $this->commentService->getComment( $comment->id )
        );
    }
}
