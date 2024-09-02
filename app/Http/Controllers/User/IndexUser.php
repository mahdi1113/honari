<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class IndexUser extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function __invoke()
    {
        return UserResource::collection(
            $this->userService->getUsers()
        );
    }
}
