<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'between:3,20', 'regex:/^[a-z]\w+$/i', 'unique:users,name'],
            'password' => ['required', 'between:5,20', 'confirmed']
        ];
    }
}
