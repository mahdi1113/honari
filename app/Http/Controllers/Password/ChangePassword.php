<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\ChangePasswordRequest;
use App\Service\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Controller
{
    public function __invoke(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return Responser::success();
    }
}
