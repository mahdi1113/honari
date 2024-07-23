<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Service\Responser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): array
    {
        $data = $request->validated();

        $user = User::query()->create($data);

        return Responser::success('', '', $user);
    }
}
