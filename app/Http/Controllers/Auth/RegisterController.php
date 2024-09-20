<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Service\CodeService;
use App\Service\Responser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $codeService;

    public function __construct(CodeService $codeService)
    {
        $this->codeService = $codeService;
    }
    public function __invoke(RegisterRequest $request): array
    {
        $this->deleteUnverifiedUserByPhone($request->cell_number);

        $data = [];
        $data[ 'user_name' ] = $request[ 'name' ];
        $data[ 'password' ] = bcrypt( $request->password );
        $data[ 'phone' ] = $request->cell_number;
        $user = User::query()->create( $data );

        $this->codeService->sendCode($user, 'registerForHonariMME');

        return Responser::success('', '', $user);
    }

    private function deleteUnverifiedUserByPhone($phoneNumber)
    {
        $userOld = User::where("phone", $phoneNumber)->where('verified', 0)->first();

        if ($userOld) {
            $userOld->forceDelete();
        }
    }
}
