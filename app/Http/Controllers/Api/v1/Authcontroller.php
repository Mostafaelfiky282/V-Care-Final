<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function register(RegisterRequest $request) {
        // $date = $validatedData = $request->validate([
        //     'name' =>'required|string|max:255',
        //     'email' =>'required|string|email|max:255|unique:users',
        //     'password' =>'required|min:8|confirmed',
        //     'password_confirmation' =>'required'
        // ]);
        $date = $request->all();
        $user = User::create($date);
        $token = $user->createtoken("Token")->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' =>'required|string|email',
            'password' =>'required',
        ]);

        if(Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            $token = $user->createToken("Token")->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }else{
            return response()->json(["error"=>"Invalid credentials"], 422);
        }
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response()->json(["message"=>"Logged out"]);
    }
}
