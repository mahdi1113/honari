<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Service\Comment\CommentService;
use App\Service\Responser;
use Illuminate\Http\Request;

class DestroyComment extends Controller
{
    protected CommentService $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->$commentService = $commentService;
    }
    public function __invoke( Comment $comment )
    {

    }
}
