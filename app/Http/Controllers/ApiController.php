<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function show($id){

    $user = User::find($id);


    if (!$user) {
        return ApiResponse::format('404', 'User not found', null)->setStatusCode(404);
    } else{

    return ApiResponse::format('200', 'User found', $user);
    }


   }



   public function store(StoreUserRequest $request)
{
    
    $data = $request->validated();

    
    $user = User::create($data);

    return ApiResponse::format('success', 'User created successfully', $user);
}
}
