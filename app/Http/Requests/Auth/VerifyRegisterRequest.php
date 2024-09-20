<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyRegisterRequest extends FormRequest
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
        return [
            'code' => 'required',
            'cell_number' => [
                'required',
                'regex:/^09[0-9]{9}$/',
                Rule::exists('users', 'phone')
                    ->where('verified', 0)
                    ->whereNull('deleted_at')
            ],
        ];
    }
}
