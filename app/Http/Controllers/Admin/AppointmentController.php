<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class AppointmentController extends Controller
{
    public function list(Request $request)
    {
        $appointments =  Appointment::all();

        // return AppointmentResource::collection($appointments);
        return view('admin.appointment.list', compact('appointments'));

    }

    public function cek(Appointment $appointment)
    {
        return view('admin.appointment.cek',  compact('appointment'));
    }

    public function approved(Appointment $appointment)
    {
        $appointment->status = 'approved';
        $appointment->save();

        return redirect('admin/appointment');

        return Response::json(['success' => 'true', 'message' => ' Approved '.$appointment->fullname.' Succesfully!', 'approved_data' => $appointment->fullname], 200);
    }

    public function canceled(Request $request, Appointment $appointment)
    {
        // $appointment->update([
        //     'status' => $request->canceled
        // ]);
        $appointment->status = 'canceled';

        $appointment->save();

        return redirect('admin/appointment');

        return Response::json(['success' => 'true', 'message' => ' Canceled ' .$appointment->fullname. ' Succesfully!', 'canceled_data' => $appointment->fullname], 200);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return back();

        return Response::json(['success' => 'true', 'message' => 'Deleted ' .$appointment->fullname. 'Succesfully!', 'deleted_data' => $appointment->fullname], 200);
    }
}
