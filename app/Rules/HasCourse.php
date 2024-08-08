<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;

class HasCourse implements Rule
{
    public function passes($attribute, $value)
    {
        $userId = Auth::id();

        $hasCourse = Purchase::where('user_id', $userId)
            ->where('course_id', $value)
            ->exists();

        return $hasCourse;
    }

    public function message()
    {
        return 'شما به این دوره دسترسی ندارید.';
    }
}
