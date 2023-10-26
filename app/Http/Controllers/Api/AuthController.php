<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // trait
    use HttpResponses;


    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt([$request->only('username', 'password')]))
            return $this->error('', 'Credentials do not much', 401);


        $user = User::where(['username' => $request->username])->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Api Token of '. $user->name)->plainTextToken
        ]);
    }


    public function register(CreateUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        return response()->json([
            'user' => $user,
            'token'=> $user->createToken('API Token of ' . $user->name)->plainTextToken,
        ]);
    }



    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have successfully been logged out your token has been deleted'
        ]);

    }


}
