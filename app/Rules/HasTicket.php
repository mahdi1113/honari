<?php

namespace App\Rules;

use App\Models\Ticket;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class HasTicket implements Rule
{
    public function passes($attribute, $value)
    {
        $userId = Auth::id();
        if($value->user_id === $userId)
        {
            return true;
        }else{
            return false;
        }
    }

    public function message()
    {
        return 'این تیکت متعلق به شما نیست.';
    }
}
