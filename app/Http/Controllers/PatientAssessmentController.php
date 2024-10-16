<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use App\Models\PatientAssessment;

class PatientAssessmentController extends Controller
{

    // Show all patient assessments
    public function show(Nurse $nurse)
    {
        // Retrieve all patient assessments from the database
        $nurses = PatientAssessment::all();
        $doctors = PatientAssessment::all();
        $dietitians = PatientAssessment::all();

        // Pass the data to the view
        return view('nurse.show', compact('nurses'));
        return view('doctor.show', compact('doctors'));
        return view('doctor.id/edit', compact('doctors'));
        return view('dietitian.show', compact('dietitians'));

    }


    // Store a new patient record
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
        PatientAssessment::create($validatedData);

        return redirect('/nurse/show')->with('success', 'Patient information has been recorded successfully.');
    }

    public function edit(PatientAssessment $patientAssessment)
    {
        return view('nurse.edit', compact('nurse'));
    }

    // Update an existing patient record
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

        $bmi = $validatedData['weight'] / (($validatedData['height'] / 100) ** 2);
        $validatedData['bmi'] = round($bmi, 2);

        $patientAssessment->update($validatedData);

        return redirect()->route('/nurse/show', ['id' => $patientAssessment->id])->with('success', 'Patient record updated successfully.');
    }


    // Delete a patient record
    public function destroy(PatientAssessment $patientAssessment)
    {
        $patientAssessment->delete();
        return redirect()->route('nurse.show', ['id' => $patientAssessment->id])->with('success', 'Patient record deleted successfully.');
    }


}