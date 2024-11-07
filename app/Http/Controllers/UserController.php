<?php

namespace App\Http\Controllers;

use App\Models\PracticeAreas;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function listServiceRequests()
    {
        $service_requests = ServiceRequest::where('client_id', Auth::user()->id)->get();
        return view('service-requests.index', compact('service_requests'));
    }
    public function createServiceRequest($id)
    {
        $practiceAreas = PracticeAreas::all();
        $service_requests = ServiceRequest::where('client_id', Auth::user()->id)->get();
        $solicitors = User::role('Solicitor')->get();
        return view('service-requests.create', compact('service_requests', 'practiceAreas', 'solicitors'));
    }
    // Method to store the Service Request
    public function storeServiceRequest(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'practice_area_id' => 'required|exists:practice_areas,id',
            'solicitor_id' => 'required|exists:users,id',
            'details' => 'required|string',
        ]);

        // Create the Service Request
        ServiceRequest::create([
            'practice_area_id' => $request->practice_area_id,
            'details' => $request->details,
            'solicitor_id' => $request->solicitor_id,
            'client_id' => Auth::id(),
            'status' => 'pending',
        ]);

        // Redirect with a success message
        return redirect()->route('client.serviceRequests')->with('success', 'Service request created successfully.');
    }
}
