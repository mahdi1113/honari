<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyRegisterRequest;
use App\Service\CodeService;
use App\Service\Responser;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;

class VerifyRegister extends Controller
{
    protected $codeService;

    public function __construct(CodeService $codeService)
    {
        $this->codeService = $codeService;
    }

    public function __invoke( VerifyRegisterRequest $request )
    {

        if ( $user = $this->codeService->verifyUser( $request->code, $request->cell_number, 'registerForHonariMME' ) ) {

            $token = $user->createToken('main');
            // Retrieve the token instance
            $personalAccessToken = $token->accessToken;
            // Set the expiration time (e.g., 2 hours from now)
            $personalAccessToken->expires_at = Carbon::now()->addHours(5);
            // Save the token to update the expires_at field
            $personalAccessToken->save();

            return Responser::success('' , '', ['token' => $token->plainTextToken, 'user' => $user]);
        }

        return response()->json([
            'msg' => 'کد اشتباه است.'
        ],422);
    }
}
