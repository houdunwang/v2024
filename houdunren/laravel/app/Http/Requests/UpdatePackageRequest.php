<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            'title' => ['required', 'between:5,20'],
            'style' => ['sometimes', 'string'],
            'ad' => ['required', 'between:10,50'],
            'price' => ['required', 'numeric'],
            'original_price' => ['required', 'numeric'],
            'months' => ['required', 'numeric'],
            'icon' => ['required', 'url'],
            'state' => ['required', 'boolean']
        ];
    }
}
