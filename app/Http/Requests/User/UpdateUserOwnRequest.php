<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserOwnRequest extends FormRequest
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
            'verified' => 'prohibited',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'cell_number' => [
                'required' ,
                'string' ,
                'regex:/^09[0-9]{9}$/' ,
                Rule::unique( 'users' , 'phone' )->ignore($userId)
            ] ,
        ];
    }
}
