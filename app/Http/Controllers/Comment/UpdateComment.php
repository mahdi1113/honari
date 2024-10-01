<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Service\Comment\CommentService;
use Illuminate\Http\Request;

class UpdateComment extends Controller
{
    protected CommentService $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function __invoke( UpdateCommentRequest $updateCommentRequest, Comment $comment )
    {
        return CommentResource::make(
            $this->commentService->updateComment( $comment->id )
        );
    }
}
