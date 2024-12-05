<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointemnt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationAppoinmentsMail;
use Illuminate\Routing\Controllers\HasMiddleware;

class AppointmentController extends Controller 
{
    // implements HasMiddleware
    // public static function middleware()
    // {
    //     return[
    //         'admin.area',
    //     ];
    // }
    public function create(User $user){
        // $request = request()->all();
        // if($user->role == 'admin' || $user->role == 'patient'){
        //     abort(403);
        // }
        // dd('assdsadasd');
        Gate::authorize('make-appointment');

        $user->load('major');
        return view('front.appointments.Addappointment',compact('user'));

    }

    public function store(Request $request, User $user){
        $request->validate([
            'name' => 'required','string','max:50','min:3',
            'email' => 'required','email','max:100',
            'phone' => 'required','numeric','max:20','min:10'
        ]);


        $appointment = new Appointemnt();
        $appointment->name = $request->name;
        $appointment->phone = $request->phone;
        $appointment->email = $request->email;
        $appointment->appointemnt_date = now()->format('Y-m-d H:i:s');
        $appointment->patient_id = auth()->user()->id;
        $appointment->doctor_id = $user->id;
        $appointment->save();
        Mail::to(auth()->user()->email)->send(new ConfirmationAppoinmentsMail($appointment));
        return redirect()->back()->with('success', 'Appointment created successfully');
    }
}
