<?php

namespace App\Http\Controllers\CheckjobSms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckJobSmsStatus extends Controller
{
    public function __invoke(User $user)
    {
        $status = DB::table('job_sms_status')->where('user_id', $user->id)->first();

        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Job status not found for the specified user.',
                'status' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => $status->status
        ], 200);
    }
}
