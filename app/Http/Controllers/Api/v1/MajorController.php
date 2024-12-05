<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\MajorResource;
use App\Models\User;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    public function index(){
        $majors = Major::with('users')->get();
        return MajorResource::collection($majors);
        // return $this->apiResponse($majors);
    }

    public function show($id){
        $major = Major::findOrFail($id);
        return new MajorResource($major);
        // return $this->apiResponse($major);
    }
    public function doctors($id){
        $doctors = User::where('role' , 'doctor')
        ->where('major_id' , $id)->get();
        return $this->apiResponse($doctors);
    }
}
