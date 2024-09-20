<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class verifyForgetPasswordCodeRequest extends FormRequest
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
            'cell_number' => [
                'required' ,
                'string' ,
                'regex:/^09[0-9]{9}$/' ,
                Rule::exists( 'users' , 'phone' )->where( 'verified' , 1 )->whereNull( 'deleted_at' )
            ] ,
            'code' => 'required'
        ];
    }
}
