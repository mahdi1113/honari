<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRepository
{
    public function index()
    {
        return Blog::with( "creator" )->paginate();
    }

    public function indexOnline()
    {
        return Blog::with( "creator" )->paginate();
    }

    public function show($blogId)
    {
        $blog = Blog::findOrFail( $blogId );
        $blog->load( "creator" );
        return $blog;
    }

    public function showOnline($blogId)
    {
        $blog = Blog::findOrFail( $blogId );
        $blog->load( "creator" );
        return $blog;
    }
    public function store($data)
    {
        $data['user_id'] = Auth::user()->id;
        $blog = Blog::query()->create( $data );

        $blog->load("creator");
        return $blog;
    }

    public function update( $data , $blogId )
    {
        $blog = Blog::findOrFail( $blogId );
        $blog->update( $data );

        $blog->load( "creator" );
        return $blog;
    }

    public function destroy( $blogId )
    {
        $blog = Blog::findOrFail( $blogId );
        return $blog->delete();
    }
}