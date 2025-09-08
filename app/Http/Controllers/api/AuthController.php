<?php

namespace App\Http\Controllers\Api;

use App\Action\Auth\AuthenticateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function authenticate(AuthenticateUserRequest $request , AuthenticateAction $action)
    {
        $data = $request->validated();

        $result = $action->handle($data , $request); 

        return Response::json($result);
    }
}