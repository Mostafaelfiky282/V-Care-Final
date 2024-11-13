<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function store(Request $request){
       $date = $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|min:8|confirmed',
            'password_confirmation' =>'required'
        ]);

        $user = User::create($date);

        Auth::login($user);
        return redirect('/')->with('success', "Registered Successfully");
        
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', "Logged Out Successfully");
    }
}
