<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'roles' => 'USER'

        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response(['access_token' => $token, 'user' => UserResource::make($user),]);
        // $validateData['password'] = bcrypt($request->password);
        // $user = User::create($validateData);
        // $accessToken = $user->createToken('authToken')->accessToken;
        // return response([
        //     'user' => $user,
        //     'accessToken' => $accessToken
        // ]);
    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $loginData['email'])->first();
        if (!$user) {
            return response(['message' => 'Users Not Found!'], 401);
        }

        if (!Hash::check($loginData['password'], $user->password)) {
            return response(['message' => 'Invalid Credentials!'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response([
            'access_token' => $token,
            'user' => UserResource::make($user)
        ]);

        // if (!auth()->attempt($loginData)) {
        //     return response(['message' => 'Invalid Credentials'], 401);
        // }

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'Logout success'
        ]);
    }
}
