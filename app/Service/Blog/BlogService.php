<?php

namespace App\Service\Blog;

use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogService
{
    public function __construct(
        readonly BlogRepositoryInterface $blogRepositoryInterface,
        readonly Request $request
    ){}
    public function getBlogs()
    {
        return $this->blogRepositoryInterface->index();
    }

    public function getBlogsOnline()
    {
        return $this->blogRepositoryInterface->indexOnline();
    }

    public function getBlog(int $id)
    {
        return $this->blogRepositoryInterface->show($id);
    }

    public function getBlogOnline(int $id)
    {
        return $this->blogRepositoryInterface->showOnline($id);
    }

    public function createBlog()
    {
        return $this->blogRepositoryInterface->store($this->data());
    }

    public function updateBlog(int $id)
    {
        return $this->blogRepositoryInterface->update($this->data(), $id);
    }

    public function destroyBlog(int $id)
    {
        return $this->blogRepositoryInterface->destroy($id);
    }

    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'status' => $this->request->get('status')
        ];

        return $data;
    }
}
