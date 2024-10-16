<?php

use App\Http\Controllers\DietitianController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientAssessmentController;
use App\Http\Controllers\ProfileController;
use App\Models\PatientAssessment;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Nurse;
use App\Http\Middleware\Doctor;
use App\Http\Middleware\Dietitian;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/nurse')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Nurse Module
    Route::get('/nurse', [NurseController::class, 'index'])->middleware('auth', 'Nurse');

    Route::get('/nurse/create', [NurseController::class, 'create'])->name('nurse.create');
    Route::post('/nurse', [PatientAssessmentController::class, 'store'])->name('nurse.store');
    Route::get('/nurse/{id}', [PatientAssessmentController::class, 'show'])->name('nurse.show');
    Route::get('/nurse/{id}/edit', [NurseController::class, 'edit'])->name('nurse.edit');
    Route::put('/nurse/{id}', [PatientAssessmentController::class, 'update'])->name('nurse.update');
    Route::delete('/nurse/{patientAssessment}', [PatientAssessmentController::class, 'destroy'])->name('nurse.destroy');

    // Doctor Module
    Route::get('/doctor', [DoctorController::class, 'index'])->middleware('auth', 'Doctor');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    // Dietitian Module
    Route::get('/dietitian', [DietitianController::class, 'index'])->middleware('auth', 'Dietitian');
    Route::get('/dietitian/create', [DietitianController::class, 'create'])->name('dietitian.create');
    Route::post('/dietitian', [DietitianController::class, 'store'])->name('dietitian.store');
    Route::get('/dietitian/{id}', [DietitianController::class, 'show'])->name('dietitian.show');
    Route::get('/dietitian/{id}/inventory', [DietitianController::class, 'inventory'])->name('dietitian.inventory');
    Route::get('/dietitian/{id}/edit', [DietitianController::class, 'edit'])->name('dietitian.edit');
    Route::put('/dietitian/{id}', [DietitianController::class, 'update'])->name('dietitian.update');
    Route::delete('/dietitian/{id}', [DietitianController::class, 'destroy'])->name('dietitian.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';