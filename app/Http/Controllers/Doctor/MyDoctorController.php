<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\MyDoctorResource;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MyDoctorController extends Controller
{
    public function create()
    {
        return view('doctor.create');
    }

    public function store(DoctorRequest $request)
    {
        $myImage = $request->file('image')->store('public/images/doctors');

        $myDoctor = Doctor::create([
            'user_id' => Auth::user()->id,
            'name' => request('name'),
            'specialty' => request('specialty'),
            'email' => request('email'),
            'no_phone' => request('no_phone'),
            'room' => request('room'),
            'image' => $myImage,
        ]);

        return redirect('doctor/dashboard');

        return Response::json(['success' => 'true', 'message' => 'Create My Identity Successfully!', 'created_data' => $myDoctor], 200);
    }

    public function identitas()
    {
        $myId = Auth::user()->id;
        $myDoctor = Doctor::where('user_id', $myId)->get();

        return view('doctor.myindentitas', compact('myDoctor'));

        return Response::json(['message' => 'Anda berada di halaman identitas', 'myidentitas' => new MyDoctorResource($myDoctor)], 200);
    }

    public function editProfile()
    {
        $myId = Auth::user()->id;
        $myDoctor = Doctor::where('user_id', $myId)->get();

        return view('doctor.edit-profile', compact('myDoctor'));
    }

    public function update(DoctorRequest $request)
    {
        $myId = Auth::user()->id;
        $myDoctor = Doctor::where('user_id', $myId)->get();

        $myImage = $myDoctor[0]->image;
        if ($request->hasFile('image')) {
            Storage::delete($myDoctor[0]->image);
            $myImage = $request->file('image')->store('public/images/doctors');
        }

         $myDoctor = Doctor::where('user_id', $myId)->first()->update([
            'user_id' => Auth::user()->id,
            'name' => request('name'),
            'specialty' => request('specialty'),
            'email' => request('email'),
            'no_phone' => request('no_phone'),
            'room' => request('room'),
            'image' => $myImage,
         ]);

         return redirect('doctor/myidentity');

        return Response::json(['succes' => 'true', 'message' => 'Updated Doctor Succesfully!', 'updated_data' => $myDoctor], 200);
    }

    public function appointment()
    {
        $authDoctor = Auth::user()->doctors->id;
        $appointments = Appointment::where('doctor_id', $authDoctor)->get();


        // return AppointmentResource::collection($appointments);

        return view('doctor.appointment', compact('appointments'));
    }

    public function showAppointment(Appointment $appointment)
    {
        // return new AppointmentResource($appointment);
        return view('doctor.show-pasien', compact('appointment'));
    }

    public function approved(Appointment $appointment)
    {
       $appointment->status = 'approved';

       $appointment->save();

       return redirect('doctor/appointment');

       return Response::json(['success' => 'true', 'message' => 'Approved ' .$appointment->fullname. ' Successfully!', 'approved_data' => $appointment->fullname], 200);
    }

    public function canceled(Appointment $appointment)
    {
        $appointment->status = 'canceled';
        $appointment->save();

        return redirect('doctor/appointment');

        return Response::json(['success' => 'true', 'message' => 'Canceled ' .$appointment->fullname. ' Successfully!', 'canceled_data' => $appointment->fullname], 200);
    }
}
