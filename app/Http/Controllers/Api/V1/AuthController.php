<?php

namespace App\Http\Controllers\Api\V1;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
       $validateUser = Validator::make($request->all(),
        [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);
        if($validateUser->fails()) {
            return ApiResponseClass::sendFailResponse($validateUser->errors(), 402);
        }


        // $user = User::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => '213123',
        //     'role' => 'user'
        // ]);

        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';

        $user->save();


        $result = [
            'token' => $user->createToken('api token')->plainTextToken
        ];

        return ApiResponseClass::sendResponse($result);

    }

    public function login() {

    }

    public function logout() {

    }
} 
