<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required|string|min:3|max:30',
            'password' => 'required|confirmed|min:4' ,
            'email' => 'email|nullable|unique:users',
            'image_profile' => 'image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}
