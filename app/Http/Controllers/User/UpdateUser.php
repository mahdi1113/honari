<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\updateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class UpdateUser extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function __invoke( User $user , updateUserRequest $updateUserRequest )
    {
        return UserResource::make(
            $this->userService->updateUser( $user->id )
        );
    }

    public function updateOnline( User $user , updateUserRequest $updateUserRequest ): UserResource
    {
        return UserResource::make(
            $this->userService->updateUser( $user->id )
        );
    }
}
