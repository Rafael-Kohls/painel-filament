<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{


    public function index()
    {
        $user = User::all();
        if (!$user) {
            return res_json(data:$user,status:404, message:'User not found');
        } else {
            // return ApiResponse::format(null, 'User found', null);
            return res_json(data:$user,message:'User Found',status:200);
        }
    }
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return res_json(data:$user,status:404, message:'User not found');
        } else {
            // return ApiResponse::format(null, 'User found', null);
            return res_json(data:$user,message:'User Found',status:200);
        }
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        // return ApiResponse::format('201', 'Success', $user);
        return res_json(data:$data,message:"Success",status:201);
    }

}
