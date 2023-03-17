<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->noContent();
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();


        if(!Auth::attempt($data)){
            return response([
                'errors' => ['Las credenciales no son correctas'],
            ], 422);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;



        return [
            'token' => $token,
            'user' => $user
        ];
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);//hash

        $user = User::create($data);// create the user
        //Token
        $token = $user->createToken('token')->plainTextToken;



        return [
            'token' => $token,
            'user' => $user
        ];
    }
}
