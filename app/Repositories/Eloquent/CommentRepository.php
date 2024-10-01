<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentRepositoryInterface
{
    public function index()
    {
        return Comment::with( "user", "replies" )->paginate();
    }

    public function show( $commentId )
    {
        $comment = Comment::findOrFail( $commentId );
        $comment->load( "user", "replies"  );
        return $comment;
    }

    public function storeOnline( $data )
    {
        $data[ 'user_id' ] = Auth::user()->id;
        $comment = Comment::query()->create($data);

        $comment->load("user");
        return $comment;
    }
    public function updateStatus( $data , $commentId )
    {
        $comment = Comment::findOrFail( $commentId );
        $comment->update( $data );

        return $comment;
    }
}
