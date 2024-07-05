<?php

if(!function_exists('res_json')){
    function res_json(mixed $data = null, ?string $message = null, int $status){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}