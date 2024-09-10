<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->is_administrator;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'between:10,30'],
            'description' => ['required', 'between:10,1000'],
            'preview' => ['required', 'url'],
            'chapter_id' => ['required', 'exists:chapters,id']
        ];
    }


    public function attributes()
    {
        return ['chapter_id' => '章节编号'];
    }
}
