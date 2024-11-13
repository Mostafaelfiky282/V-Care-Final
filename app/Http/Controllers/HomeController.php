<?php

namespace App\Http\Controllers;

use App\Models\major;
use App\Models\user;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    $majors = Major::take(9)->get();
    $doctors = User::with('major')->where('role','doctor')->take(12)->get();

    return view('front.home',compact('majors','doctors'));
    }
}
