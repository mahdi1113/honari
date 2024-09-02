<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class ShowUser extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function __invoke( User $user )
    {
        return UserResource::make(
            $this->userService->getUser( $user->id )
        );
    }

    public function showOnline()
    {
        return UserResource::make(
            $this->userService->getUserOnline()
        );
    }
}
