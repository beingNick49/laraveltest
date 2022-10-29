<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|unique:users|max:250',
            'password' => 'required|string|min:6|max:250',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login()
    {
        $validatedData = request()->validate([
            'email' => 'required|string|email|max:250',
            'password' => 'required|string|min:6|max:250',
        ]);

        if (!auth()->attempt(request()->only('email', 'password'))) {
            return response()->json([
                'message' => 'These credentials do not match our records.'
            ], 401);
        }

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function me()
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