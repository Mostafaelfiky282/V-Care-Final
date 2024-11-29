<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function submitLogin(LoginRequest $request) {
        $data = $request->validated();
        // dd($data);
        
        if(Auth::attempt($data)){
            return to_route('/');
        }
        return back()->withErrors(['error' => 'Invalid credentials']);
    }
}
