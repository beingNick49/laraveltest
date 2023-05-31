<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json([
            'user' => $user,
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt(request()->only('email', 'password'))) {
            return response()->json([
                'message' => 'These credentials do not match our records.'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function profile()
    {
        return response()->json([
            'user' => request()->user()
        ]);
    }

    public function logout()
    {
        request()->user()->tokens()->delete();

        return response()->json([
            'message' => 'logged out'
        ]);
    }
}
