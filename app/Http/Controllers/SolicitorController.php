<?php

namespace App\Http\Controllers;

use App\Models\PracticeAreas;
use App\Models\SolicitorServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SolicitorController extends Controller
{
    public function listPracticeAreas()
    {
        return view('solicitor.practice-areas.index');
    }
    public function createPracticeArea()
    {
        $practiceAreas = PracticeAreas::all();
        return view('solicitor.practice-areas.create', compact('practiceAreas'));
    }
    public function listServiceRequests()
    {
        return view('solicitor.practice-areas.index');
    }
    public function storePracticeArea(Request $request)
    {
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

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $existingService = SolicitorServices::where('practice_area_id', $request->practice_area_id)
            ->where('solicitor_id', Auth::user()->id)
            ->first();


        if ($existingService) {
            return redirect()->back()
                ->with('error', 'You have already created a service for this practice area.')
                ->withInput();
        }

        SolicitorServices::create([
            'practice_area_id' => $request->practice_area_id,
            'cost' => $request->cost,
            'solicitor_id' => Auth::user()->id,
        ]);

        return redirect()->route('solicitor.practiceAreas')->with('success', 'Service created successfully.');
    }
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video_link' => 'nullable|url',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
        ]);

        $profile = $user->profile ?? $user->profile()->create();

        if ($request->hasFile('background_image')) {
            if ($profile->background_image) {
                Storage::delete($profile->background_image);
            }

            $backgroundImagePath = $request->file('background_image')->store('backgrounds', 'public');
            $profile->background_image = $backgroundImagePath;
        }

        $profile->video_link = $validatedData['video_link'] ?? $profile->video_link;
        $profile->location = $validatedData['location'] ?? $profile->location;
        $profile->bio = $validatedData['bio'] ?? $profile->bio;

        $profile->save();

        return Redirect::route('profile.edit')->with('success', 'Your Solicitor Profile Saved successfully.');
    }
}
