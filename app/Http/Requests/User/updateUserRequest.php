<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user'); // فرض بر این است که ID کاربر در پارامترهای مسیر قرار دارد

        return [
            'user_name' => 'required|string|min:3|max:30',
            'password' => 'required|min:4',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
        ];
    }
}
