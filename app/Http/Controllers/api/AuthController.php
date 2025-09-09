<?php

namespace App\Http\Controllers\Api;

use App\Action\Auth\AuthenticateAction;
use App\Action\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function authenticate(AuthenticateUserRequest $request , AuthenticateAction $action)
    {
        $data = $request->validated();

        $result = $action->handle($data , $request); 

        return Response::json($result);
    }


    public function register(RegisterUserRequest $request , RegisterUserAction $action)
    {
        $data = $request->validated();

        $result = $action->handle($data , $request); 

        return Response::json([
            'status' => true ,
            'message' => "You are registred in website"
        ]);
    }

    public function logout(Request $request)
    {
        // Auth::user()->currentAccessToken()->delete();
        $request->user()->currentAccessToken()->delete();

        return Response::json([
		'status' => true,
		'message' => 'you are logout from website'
	]);
    }
}