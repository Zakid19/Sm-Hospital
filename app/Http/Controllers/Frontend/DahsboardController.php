<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DahsboardController extends Controller
{
    public function welcome()
    {
        $doctors = Doctor::all();
        $appointments = Appointment::all();

        return view('welcome', compact('doctors','appointments'));
    }
}
