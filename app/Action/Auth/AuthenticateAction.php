<?php

namespace App\Action\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticateAction 
{
    public function handle(array $data, Request $request)
    {
        if ($request->expectsJson()) {
            $user = $this->apiAuthenticate($data);

            if (!$user) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            return response()->json([
                'token' => $user->createToken('api-token')->plainTextToken,
                'user'  => $user,
            ]);
        }
    }

    private function apiAuthenticate(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Auth::attempt($data)) {
            return null;
        }

        return $user;
    }
}