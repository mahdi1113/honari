<?php

namespace App\Http\Requests\Ticket;

use App\Rules\HasTicket;
use Illuminate\Foundation\Http\FormRequest;

class ShowTicketRequest extends FormRequest
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
            'id' => [new HasTicket()],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('ticket'),
        ]);
    }
}
