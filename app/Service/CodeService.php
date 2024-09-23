<?php

namespace App\Service;
use App\Jobs\SendSmsNotificationJob;
use App\Models\User;
use App\Notifications\SmsNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CodeService
{
    public function sendCode( $user, $purpose )
    {
        DB::table('job_sms_status')->updateOrInsert(
            ['user_id' => $user->id],  // شرط اینکه برای این کاربر رکوردی موجود است یا خیر
            ['status' => 'pending', 'created_at' => now(), 'updated_at' => now()] // اگر موجود نیست، رکورد جدید ایجاد می‌شود
        );
        return SendSmsNotificationJob::dispatch($user, $purpose);
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
