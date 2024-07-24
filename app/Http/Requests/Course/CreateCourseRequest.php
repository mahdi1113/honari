<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration_course' => 'required',
            'method_holding' => 'required',
            'course_teacher_id' => 'required|array|min:1',
            'course_teacher_id.*' => 'integer|exists:teacher_courses,id'
        ];
    }
}
