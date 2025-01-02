<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;
    // Login function
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse('Login failed!', 'Unauthorized', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        $user->token = $token;

        return $this->successResponse(['user' =>$user], 'User Successfully Authenticated', 200);
    }

    // Logout function
    public function logout(Request $request)
    {
        if (Auth::user()) {
            Auth::user()->tokens()->delete();
        }
        return $this->successResponse([], null, 201);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole(RolesEnum::ADMIN->value);
        $token = $user->createToken('authToken')->plainTextToken;
        return $this->successResponse(['user' => $user, 'token' => $token], 'Logged out successfully', 201);

    }
}
