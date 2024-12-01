<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index(){
        $doctors = User::where('role', 'doctor')->get();
        return response()->json($doctors);
    }
}
