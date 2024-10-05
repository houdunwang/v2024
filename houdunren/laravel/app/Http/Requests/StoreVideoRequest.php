<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return isAdministrator();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'videos' => ['required', 'array']
        ];
    }

    public function attributes()
    {
        return ['videos' => '视频'];
    }
    // public function
    // public function messages()
    // {
    //     return [
    //         'lesson_id.required' => ['请选择课程']
    //     ];
    // }
}