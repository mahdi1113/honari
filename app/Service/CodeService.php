<?php

namespace App\Service;
use App\Models\User;
use App\Notifications\SmsNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class CodeService
{
    public function sendCode( $user, $purpose )
    {
        $code = rand( 100000 , 999999 );
        $cacheKey = 'otp_' . $purpose . '_' . $user->phone;
        Cache::put($cacheKey, $code, 120);
        $user = User::where( 'id' , $user->id )->first();
        $user->notify(new SmsNotification($code));
    }

    public static function verifyUser( $code, $cell_number, $purpose )
    {
        $cacheKey = 'otp_' . $purpose . '_' . $cell_number;

        if ( Cache::has( $cacheKey ) and Cache::get( $cacheKey ) == $code ) {
            $user = User::query()->where( 'phone' , $cell_number )->first();
            $user->verified = true;
            $user->save();
            return $user;
        }
    }
}
