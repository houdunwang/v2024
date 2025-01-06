<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $file = $request->file('file');
        $url = $file->storeAs('image', $file->hashName(), 'public');
        return ['url' => url($url)];
    }
}
