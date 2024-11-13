<?php

namespace App\Http\Controllers;

use App\Models\major;
use App\Models\User;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    public function index() {
        $majors = Major::orderBy('id','DESC')->paginate(10);
        return view('front.majors.majors',['majors' => $majors]);
    }
    public function doctors(Major $major) {
        $doctors = User::with('major')
        ->where('role','doctor')
        ->where('major_id',$major->id)
        ->paginate(12);
        return view('front.doctors.doctors', compact('doctors'));
    }
    
}
