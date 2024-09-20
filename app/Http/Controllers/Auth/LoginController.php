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
        $credentials = $this->findCredentials( $request );
        if ( auth()->attempt( $credentials ) ) {
                $token = auth()->user()->createToken('main');
                // Retrieve the token instance
                $personalAccessToken = $token->accessToken;
                // Set the expiration time (e.g., 2 hours from now)
                $personalAccessToken->expires_at = Carbon::now()->addHours(5);
                // Save the token to update the expires_at field
                $personalAccessToken->save();
                return Responser::success('' , '', ['token' => $token->plainTextToken, 'user' => auth()->user()]);
        }
        return response()->json( Responser::error( [ 'credentials' => trans( 'messages.credentials' ) ] ) , 422 );
    }

    private function findCredentials($request): array
    {
        return
            [
                "phone" => $request->cell_number ,
                'password' => $request->password
            ];
    }
}
