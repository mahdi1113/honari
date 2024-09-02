<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Service\MediaHelper;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::query()->paginate();
    }

    public function show( $userId )
    {
        $user = User::findOrFail( $userId );

        return $user;
    }

    public function showOnline()
    {
        return Auth::user();
    }
    public function store( $data )
    {
        $user = User::query()->create( $data );

        MediaHelper::moveMediaTo( $user );

        return $user;
    }

    public function update( $data , $userId )
    {
        $user = User::findOrFail( $userId );
        $user->update( $data );

        MediaHelper::moveMediaTo( $user );

        return $user;
    }

    public function updateOnline( $data , $userId )
    {
        $user = User::findOrFail( $userId );
        $user->update( $data );

        MediaHelper::moveMediaTo( $user );

        return $user;
    }

    public function destroy( $userId )
    {
        $user = User::findOrFail( $userId );
        return $user->delete();
    }
}
