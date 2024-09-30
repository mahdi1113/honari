<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'password' => 'required|min:4',
            'verified' => 'required',
            'email' => [
                'nullable',
                'email',
                Rule::unique('users'),
            ],
            'cell_number' => [
                'required' ,
                'string' ,
                'regex:/^09[0-9]{9}$/' ,
                Rule::unique( 'users' , 'phone' )
            ] ,
        ];
    }
}
