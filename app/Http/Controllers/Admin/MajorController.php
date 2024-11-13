<?php

namespace App\Http\Controllers\Admin;

use App\Models\major;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Traits\UploadImage;
class MajorController extends Controller
{
    // use UploadImage;
    public function create()
    {
        return view('admin.majors.create');
    }

    public function store()
    {
        request()->validate([
            "name" => "required",
            "string",
            "min:5",
            "max:35",
            "image" => "required",
            "image"
        ]);
        $image_name = $this->uploadImage('uploads/majors/');

        Major::create([
            "name" => request()->name,
            "image" => $image_name
        ]);
        return redirect('/majors/add')->with('success', "Major Added Successfully");
    }

    public function edit(Major $major)
    {
        // $major = Major::findOrFail($id);
        return view('admin.majors.edit', compact('major'));
    }
    public function update(Request $request, Major $major)
    {
        // $major = Major::findOrFail($id);
        request()->validate([
            "name" => "required",
            "string",
            "min:5",
            "max:35",
            "image" => "nullable",
            "image"
        ]);
        if ($request->image) {
            $image_name = $this->uploadImage('uploads/majors/');
            $major->image = $image_name;
        }
        $major->name = $request->name;
        $major->save();
        return back()->with('success', "Major Updated Successfully");
    }

    public function destroy(Major $major){
        $major->delete();
        return back()->with('success', "Major Deleted Successfully");
    }
    private function uploadImage($path)
    {
        $image_name = request()->image->getClientOriginalName();
        $image_name = time() . '_' . $image_name;
        request()->image->move(public_path($path), $image_name);
        return $image_name;
    }
}

