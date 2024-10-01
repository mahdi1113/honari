<?php

namespace App\Service\Comment;

use App\Repositories\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentService
{
    public function __construct(
        readonly CommentRepositoryInterface $commentRepositoryInterface,
        readonly Request $request
    )
    {
    }

    public function getComments()
    {
        return $this->commentRepositoryInterface->index();
    }


    public function getComment(int $id)
    {
        return $this->commentRepositoryInterface->show($id);
    }


    public function createComment()
    {
        return $this->commentRepositoryInterface->storeOnline($this->data());
    }

    public function updateComment(int $id)
    {
        return $this->commentRepositoryInterface->updateStatus(['status' => $this->request->get('status')], $id);
    }

    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'course_id' => $this->request->get('course_id'),
            'user_id' => $this->request->get('user_id'),
        ];

        if ($this->request->has('parent_id')) {
            $data['parent_id'] = $this->request->get('parent_id');
        }


        return $data;
    }
}

