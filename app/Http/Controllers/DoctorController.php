<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\PatientAssessment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'condition_type' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'daily_activity' => 'required|string',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'date_of_admission' => 'required|date',
        ]);

        // Calculate BMI if height and weight are provided
        $validatedData['bmi'] = $validatedData['weight'] / (($validatedData['height'] / 100) ** 2);

        PatientAssessment::create($validatedData);

        return redirect()->back()->with('success', 'Patient assessment has been recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        $doctors = PatientAssessment::all();

        // Pass the data to the view
        return view('doctor.show', compact('doctors'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $doctors = PatientAssessment::all();

        // Pass the data to the view
        return view('doctor.edit', compact('doctors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
