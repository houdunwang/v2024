<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

trait ImageUpload
{
    public function uploadImage(Request $request, $fieldName = 'image', $min = 10, $max = 3 * 1024, $width = 1920, $height = 1024)
    {
        $request->validate([
            $fieldName => [
                'required',
                'image',
                File::image()
                    ->min($min)
                    ->max($max)
                    ->dimensions(Rule::dimensions()->maxWidth($width)->maxHeight($height)),

            ]
        ]);

        $file = $request->file($fieldName);

        if (!$file->isValid()) {
            throw ValidationException::withMessages([
                $fieldName => '图片格式错误'
            ]);
        }

        return Auth::user()->uploads()->create([
            'url' => $file->store(date('Ymd'), 'public'),
            'name' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
            'size' => $file->getSize(),
            'extension' => $file->getClientOriginalExtension(),
        ]);
    }
}
