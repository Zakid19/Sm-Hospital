<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class PasienController extends Controller
{
    public function store(Request $request)
    {
        $appointment = Appointment::create([
            'user_id' => (Auth::user()->id),
            'doctor_id' => request('doctor_id'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'no_phone' => request('no_phone'),
            'date' => request('date'),
            'message' => request('message'),
        ]);

        return redirect('myappointment');

        return Response::json(['succes' => 'true', 'message' => 'Make a Appointment Succesfully!', 'created_data' => new AppointmentResource($appointment)], 200);
    }

    public function myAppointment(Request $request)
    {
        $myId = Auth::user()->id;
        $myappointment = Appointment::where('user_id', $myId)->get();

        // return AppointmentResource::collection($myappointment);

        return view('pasien.my-appointment', compact('myappointment'));
    }

    public function editAppointment(Appointment $appointment)
    {
        return view('pasien.edit-appointment', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'fullname' => request('fullname'),
            'date' => request('date'),
            'message' => request('message')
        ]);

        return redirect('myappointment');

        return Response::json(['success' => 'true', 'message' => 'Update My Appointment Succesfully!', 'updated_data' => new AppointmentResource($appointment)], 200);
    }

    public function cancelAppointment(Appointment $appointment)
    {
        $appointment->delete();

        return back();

        return Response::json(['cancel' => 'success', 'message' => 'Cancel Appointment Successfully', 'deleted_data' => $appointment->fullname], 200);

    }
}
