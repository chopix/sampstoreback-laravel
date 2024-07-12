<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Classes\ApiResponseClass;


class UserController extends Controller
{
    public function index() {
        return ApiResponseClass::sendResponse(User::with('accounts')->get());
    }

    public function show($id) {
        if(!User::find($id)) {
            return ApiResponseClass::sendFailResponse('Аккаунт с таким айди не найден', 404);
        }
        return ApiResponseClass::sendResponse(User::with('accounts')->find($id));
    }

}
