<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function list()
    {
        $doctors = Doctor::all();

        // return DoctorResource::collection($doctors);
        return view('admin.doctor.list', compact('doctors'));
    }

    public function detail(Doctor $doctor)
    {
        return view('admin.doctor.detail', compact('doctor'));
    }

    public function store(DoctorRequest $request)
    {
        $imageDoctor = $request->file('image')->store('public/images/doctors');

        $doctor = Doctor::create([
            'name' => request('name'),
            'specialty' => request('specialty'),
            'email' => request('email'),
            'no_phone' => request('no_phone'),
            'room' => request('room'),
            'image' => $imageDoctor,
        ]);

        return redirect()->route('admin.doctor.list')->with('succes', 'Created Doctor Succesfully!');

        // Api Response
        return Response::json(['succes' => 'yes', 'message' => 'Created Doctor Succesfully!', 'created_data' => new DoctorResource($doctor)], 200);
    }

    public function edit(Doctor $doctor)
    {
        return view('admin/doctor/edit', [
            'doctor' => $doctor
        ]);
    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $imageDoctor = $doctor->image;

        // Jika ada permintaan lagi image
        if ($request->hasFile('image')) {
            Storage::delete($doctor->image);
            $imageDoctor = $request->file('image')->store('public/images/doctors');
        }

        $doctor->update([
            'name' => request('name'),
            'specialty' => request('specialty'),
            'email' => request('email'),
            'no_phone' => request('no_phone'),
            'room' => request('room'),
            'image' => $imageDoctor,
        ]);

        return redirect('admin/doctor');

        return Response::json(['succes' => 'true', 'message' => 'Updated Doctor Succesfully!', 'updated_data' => new DoctorResource($doctor)], 200);
    }

    public function destroy(Doctor $doctor)
    {
        Storage::delete($doctor->image);

        $doctor->appointments()->delete();
        $doctor->delete();

        return back();

        return Response::json(['succes' => 'true', 'message' => 'Deleted Doctor Succesfully!', 'deleted_data' => $doctor->name], 200);
    }
}
