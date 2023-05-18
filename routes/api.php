<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\MyDoctorController;
use App\Http\Controllers\Frontend\PasienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {

        Route::get('dashboard', [DashboardController::class, 'dashboard']);

        // Doctor
        Route::get('doctor', [DoctorController::class, 'list']);
        Route::post('doctor', [DoctorController::class, 'store']);
        Route::put('doctor/{doctor}/update', [DoctorController::class, 'update']);
        Route::delete('doctor/{doctor}/delete', [DoctorController::class, 'destroy']);

        // Appointment
        Route::get('appointment', [AppointmentController::class, 'list']);
        Route::get('appointment/{appointment}/approved', [AppointmentController::class, 'approved']);
        Route::patch('appointment/{appointment}/canceled', [AppointmentController::class, 'canceled']);
        Route::delete('appointment/{appointment}/delete', [AppointmentController::class, 'destroy']);

        // User Management
        Route::get('user', [UserManagementController::class, 'list']);
        Route::put('user/{user}/update', [UserManagementController::class, 'update']);
        Route::delete('user/{user}/delete', [UserManagementController::class, 'destroy']);

    });

    Route::group(['middleware' => 'role:doctor', 'prefix' => 'doctor'], function() {

        Route::get('dashboard', [DoctorDashboardController::class, 'dashboard']);

        // My Profile
        Route::post('create', [MyDoctorController::class, 'store']);
        Route::get('myidentity', [MyDoctorController::class, 'identitas']);
        Route::put('profile/update', [MyDoctorController::class, 'update']);

        // Appointment
        Route::get('appointment', [MyDoctorController::class, 'appointment']);
        Route::get('appointment/{appointment}/show', [MyDoctorController::class, 'showAppointment']);
        Route::get('appointment/{appointment}/approved', [MyDoctorController::class, 'approved']);
        Route::patch('appointment/{appointment}/canceled', [MyDoctorController::class, 'canceled']);
    });


    Route::group(['middleware' => 'role:pasien', 'prefix' => 'pasien'], function() {
        Route::post('appointment', [PasienController::class, 'store']);
        Route::get('myappointment', [PasienController::class, 'myappointment']);
        Route::put('appointment/{appointment}/update', [PasienController::class, 'update']);
        Route::delete('appointment/{appointment}/cancel', [PasienController::class, 'cancelAppointment'])
;    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
});
