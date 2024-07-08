<?php

if(!function_exists('res_json')){
    function res_json(mixed $data = null, ?string $message = null, int $status = 200){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}

// namespace App\Helpers;

// class ApiResponse
// {
//     public static function format($status, $message, $data = null)
//     {
//         return response()->json([
//             'status' => $status,
//             'message' => $message,
//             'data' => $data,
//         ], $status);
//     }
// }