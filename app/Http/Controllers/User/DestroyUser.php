<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\Responser;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyUser extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function __invoke( User $user ): JsonResponse
    {
        $this->userService->destroyUser($user->id);
        return response()->json( Responser::success() );
    }
}
