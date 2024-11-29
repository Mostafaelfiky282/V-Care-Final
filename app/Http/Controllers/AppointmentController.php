<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationAppoinmentsMail;
use App\Models\User;
use App\Models\Appointemnt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function create(User $user){
        $user->load('major');
        return view('front.appointments.Addappointment',compact('user'));

    }

    public function store(Request $request, User $user){
        $request->validate([
            'name' => 'required','string','max:50','min:3',
            'email' => 'required','email','max:100',
            'phone' => 'required','string','max:20','min:10'
        ]);


        $appointment = new Appointemnt();
        $appointment->name = $request->name;
        $appointment->phone = $request->phone;
        $appointment->email = $request->email;
        $appointment->appointemnt_date = now()->format('Y-m-d H:i:s');
        $appointment->patient_id = auth()->user()->id;
        $appointment->doctor_id = $user->id;
        $appointment->save();
        Mail::to(auth()->user()->email)->send(new ConfirmationAppoinmentsMail());
        return redirect()->back()->with('success', 'Appointment created successfully');
    }
}
