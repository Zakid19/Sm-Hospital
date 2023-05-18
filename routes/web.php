<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\MyDoctorController;
use App\Http\Controllers\Frontend\DahsboardController;
use App\Http\Controllers\Frontend\PasienController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [DahsboardController::class, 'welcome'])->name('welcome');

Route::group(['middleware' => 'auth'], function() {

    // Admin Akses
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('doctor', [DoctorController::class, 'list'])->name('doctor.list');
        Route::get('doctor/add', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('doctor', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('doctor/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::put('doctor/{doctor}/update', [DoctorController::class, 'update'])->name('doctor.update');
        Route::delete('doctor/{doctor}/delete', [DoctorController::class, 'destroy'])->name('doctor.delete');
        Route::get('doctor/{doctor}/detail', [DoctorController::class, 'detail'])->name('doctor.detail');

        Route::get('appointment', [AppointmentController::class, 'list'])->name('appointment.list');
        Route::get('appointment/{appointment}/cek', [AppointmentController::class, 'cek'])->name('appointment.cek');
        Route::get('approved/{appointment}', [AppointmentController::class, 'approved'])->name('appointment.approved');
        Route::patch('canceled/{appointment}', [AppointmentController::class, 'canceled'])->name('appointment.canceled');
        Route::delete('appointment/{appointment}/delete', [AppointmentController::class, 'destroy'])->name('appointment.delete');

        Route::get('user', [UserManagementController::class, 'list'])->name('user.list');
        Route::get('user/{user}/edit', [UserManagementController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}/update', [UserManagementController::class, 'update'])->name('user.update');
        Route::delete('user/{user}/delete', [UserManagementController::class, 'destroy'])->name('user.delete');
    });

    // Doctor Akses
    Route::group(['middleware' => 'role:doctor', 'prefix' => 'doctor', 'as' => 'doctor.'], function() {
        Route::get('dashboard', [DoctorDashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('create', [MyDoctorController::class, 'create'])->name('create');
        Route::post('create', [MyDoctorController::class, 'store'])->name('store');

        Route::get('myidentity', [MyDoctorController::class, 'identitas'])->name('identitas');
        Route::get('edit-profile', [MyDoctorController::class, 'editProfile'])->name('edit.profile');
        Route::put('edit-profile', [MyDoctorController::class, 'update'])->name('update.profile');

        Route::get('appointment', [MyDoctorController::class, 'appointment'])->name('appointment');
        Route::get('appointment/{appointment}/show', [MyDoctorController::class, 'showAppointment'])->name('appointment.show');
        Route::get('appointment/{appointment}/approved', [MyDoctorController::class, 'approved'])->name('appointment.approved');
        Route::patch('appointment/{appointment}/canceled', [MyDoctorController::class, 'canceled'])->name('appointment.canceled');
        Route::delete('appointment/{appointment}/delete', [MyDoctorController::class, 'destroy'])->name('appointment.delete');

    });

    // Pasien Akses
    Route::group(['middleware' => 'role:pasien'], function() {
        Route::post('appointment', [PasienController::class, 'store'])->name('appointment.store');
        Route::get('myappointment', [PasienController::class, 'myAppointment'])->name('my-appointment');
        Route::get('myappointment/{appointment:user_id}/edit', [PasienController::class, 'editAppointment'])->name('appointment.edit');
        Route::put('myappointment/{appointment:user_id}/update', [PasienController::class, 'update'])->name('updateAppointment');
        Route::delete('appointment/{appointment}/cancel', [PasienController::class, 'cancelAppointment'])->name('appointment.cancel');
    });

});
