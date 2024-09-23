<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SmsNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendSmsNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = [5,5,5];

    public $user;
    public $purpose;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, $purpose)
    {
        $this->user = $user;
        $this->purpose = $purpose;
        $this->onQueue('send-sms-notification');
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        DB::table('job_sms_status')->where('user_id', $this->user->id)->update(['status' => 'processing']);

        try {
            $code = rand(100000, 999999);
            $cacheKey = 'otp_' . $this->purpose . '_' . $this->user->phone;
            Cache::put($cacheKey, $code, 120);

            $user = User::where('id', $this->user->id)->first();
            $channel = new \App\Channel\SmsChannel();
            $result = $channel->send($user, new SmsNotification($code));

            if (!$result->isSuccess) {
                throw new \Exception('SMS sending failed: ' . $result->message);
            }

            DB::table('job_sms_status')->where('user_id', $this->user->id)->update(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error("Error sending SMS: " . $e->getMessage());
            throw $e; // پرتاب مجدد خطا
        }
    }

    public function failed(\Throwable $exception)
    {
        DB::table('job_sms_status')->where('user_id', $this->user->id)->update(['status' => 'failed']);
    }


}
