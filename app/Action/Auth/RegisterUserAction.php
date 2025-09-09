<?php 

namespace App\Action\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserAction{

    public function handle(array $data , Request $request)
    {
        if ($request->expectsJson()) {
            $user = $this->apiRegister($data);

            if (!$user) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            return response()->json([
                'token' => $user->createToken('api-token')->plainTextToken,
                'user'  => $user,
            ]);
        }

        $user = User::create($data);

        return $user;
    }

    private function apiRegister(array $data)
    {
        return User::create($data);
    }
}