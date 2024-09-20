<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\verifyForgetPasswordCodeRequest;
use App\Models\User;
use App\Service\CodeService;
use App\Service\Responser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForgetPassword extends Controller
{
    protected $codeService;

    public function __construct(CodeService $codeService)
    {
        $this->codeService = $codeService;
    }

    public function __invoke(ForgetPasswordRequest $request)
    {
        $user = $this->findUserByCellNumber($request->cell_number);
        if($user){
            $this->codeService->sendCode($user, 'ForgetPassForHonariMME');
            return Responser::success('کد ارسال شد', 'success');
        }else{
            return Responser::error();
        }
    }

    public function verifyForgetPasswordCode(verifyForgetPasswordCodeRequest $request)
    {
        if ( $user = $this->codeService->verifyUser( $request->code, $request->cell_number, 'ForgetPassForHonariMME' ) ) {

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
            'msg' => 'خطا'
        ],422);
    }

    private function findUserByCellNumber($cell_number)
    {
        $user = User::query()->where( 'phone' , $cell_number )->first();
        return $user;
    }
}
