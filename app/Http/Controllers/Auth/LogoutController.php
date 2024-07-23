<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::user()->currentAccessToken()->delete();
        return Responser::success('با موفقیت خارج شدید', 'success');
    }
}
