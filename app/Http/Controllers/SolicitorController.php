<?php

namespace App\Http\Controllers;

use App\Models\PracticeAreas;
use App\Models\SolicitorServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SolicitorController extends Controller
{
    public function getPracticeAreas()
    {
        return view('solicitor.practice-areas.index');
    }
    public function createPracticeAreas()
    {
        $practiceAreas = PracticeAreas::all();
        return view('solicitor.practice-areas.create', compact('practiceAreas'));
    }
    public function storePracticeAreas(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'practice_area_id' => 'required|exists:practice_areas,id',
            'cost' => 'required|numeric|min:0',
        ], [
            'practice_area_id.required' => 'Please select a practice area.',
            'practice_area_id.exists' => 'The selected practice area is invalid.',
            'cost.required' => 'Please enter the cost of service.',
            'cost.numeric' => 'The cost must be a number.',
            'cost.min' => 'The cost must be at least 0.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the Solicitor Service
        SolicitorServices::create([
            'practice_area_id' => $request->practice_area_id,
            'cost' => $request->cost,
            'solicitor_id' => auth()->id(), // Assuming the user is authenticated
        ]);

        // Flash a success message
        return redirect()->back()->with('success', 'Service created successfully.');
    }
}
