<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
        // return response()->json(['message' => 'Ini Halaman Dashboard Doctor']);
    }
}
