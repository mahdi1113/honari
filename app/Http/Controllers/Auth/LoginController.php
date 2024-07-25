<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Service\Responser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return Responser::error(['unAuth' => 'نام کاربری یا رمز عبور اشتباه است.'], '');
        }

        $user = Auth::user();
        $token = $user->createToken('main');
        // Retrieve the token instance
        $personalAccessToken = $token->accessToken;
        // Set the expiration time (e.g., 2 hours from now)
        $personalAccessToken->expires_at = Carbon::now()->addHours(5);
        // Save the token to update the expires_at field
        $personalAccessToken->save();
        return Responser::success('' , '', ['token' => $token->plainTextToken, 'user' => $user]);
    }
}
