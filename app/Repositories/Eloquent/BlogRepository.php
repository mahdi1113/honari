<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use App\Service\MediaHelper;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function index()
    {
        return Blog::with( "creator" )->paginate();
    }

    public function indexOnline()
    {
        return Blog::with( "creator" )->paginate(8);
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

        MediaHelper::moveMediaTo( $blog );
        MediaHelper::moveTinyMCEMediaTo( $blog );

        $blog->load("creator");
        return $blog;
    }

    public function update( $data , $blogId )
    {
        $blog = Blog::findOrFail( $blogId );
        $blog->update( $data );

        if (isset($data['file_batch_id'])) {
            MediaHelper::moveMediaTo( $blog );
        }

        $blog->load( "creator" );
        return $blog;
    }

    public function destroy( $blogId )
    {
        $blog = Blog::findOrFail( $blogId );
        return $blog->delete();
    }
}
