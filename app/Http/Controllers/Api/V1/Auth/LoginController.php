<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\V1\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * login
     *
     * @param  LoginRequest $request
     * @return json
     */
    public function login(LoginRequest $request) {

        $data = $request->all();
        
        if(!Auth::attempt($data)){
            
            return response()->json([
                'message' => 'Credentials not match',
                'status' => 'error',
            ], 401);
        }


        return response()->json([
            'message' => 'Login success',
            'status' => 'success',
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
        ], 200);


    }
}
