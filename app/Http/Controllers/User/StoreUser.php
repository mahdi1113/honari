<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Service\User\UserService;

class StoreUser extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function __invoke( CreateUserRequest $registerRequest )
    {
        return UserResource::make(
            $this->userService->createUser()
        );
    }
}
