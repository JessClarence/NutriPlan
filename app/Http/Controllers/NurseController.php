<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\PatientAssessment;
use Illuminate\Http\Request;


class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nurse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nurse.create');
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

        // Calculate the BMI
        $bmi = $validatedData['weight'] / (($validatedData['height'] / 100) ** 2);

        // Merge the BMI into the validated data
        $validatedData['bmi'] = round($bmi, 2); // Round the BMI to 2 decimal places

        // Create the nurse record with the validated data and calculated BMI
        Nurse::create($validatedData);

        return redirect('/nurse/show')->with('success', 'Patient information has been recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nurse $nurse)
    {
        $nurses = Nurse::all();
        $doctors = Nurse::all();
        $dietitians = Nurse::all();

        // Pass the data to the view
        return view('nurse.show', compact('nurses'));
        return view('doctor.show', compact('doctors'));
        return view('doctor.id/edit', compact('doctors'));
        return view('dietitian.show', compact('dietitians'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nurse $nurse)
    {
        return view('nurse.edit', compact('nurse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientAssessment $patientAssessment)
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

        // Calculate the BMI
        $bmi = $validatedData['weight'] / (($validatedData['height'] / 100) ** 2);

        // Merge the BMI into the validated data
        $validatedData['bmi'] = round($bmi, 2); // Round the BMI to 2 decimal places

        // Update the nurse record with the validated data
        $patientAssessment->update($validatedData);

        return redirect()->route('/nurse/show', parameters: ['id' => $patientAssessment->id])->with('success', 'Patient record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nurse $nurse)
    {
        $nurse->delete();
        return redirect()->route('id', ['id' => $nurse->id])->with('success', 'Patient record deleted successfully.');
    }
}