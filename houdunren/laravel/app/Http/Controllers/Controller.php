<?php

namespace App\Http\Controllers;

use F9Web\ApiResponseHelpers;

abstract class Controller
{
    use ApiResponseHelpers;
    // protected function success(string $message = '操作成功', mixed $data = [], int $code = 200)
    // {
    //     return response()->json([
    //         'message' => $message,
    //         'data' => $data
    //     ], $code);
    // }

    // protected function error(string $message = '操作失败', mixed $data = [], int $code = 400)
    // {
    //     return response()->json([
    //         'message' => $message,
    //         'data' => $data
    //     ], $code);
    // }
}
