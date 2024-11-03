<?php

namespace App\Http\Controllers;

use App\Models\PracticeAreas;
use App\Models\Profile;
use App\Models\SolicitorServices;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $practiceAreas = PracticeAreas::all();
        return view('welcome', compact('practiceAreas'));
    }
    public function practice()
    {
        $practiceAreas = PracticeAreas::all();
        return view('practice-areas.index', compact('practiceAreas'));
    }

    public function practice_detail($name)
    {
        $area = PracticeAreas::where('name', $name)->first();
        $practiceAreas = PracticeAreas::all();
        $solicitors = SolicitorServices::where('practice_area_id', $area->id)->get();

        foreach ($solicitors as $solicitor) {
            $solicitor->profile = Profile::where('user_id', $solicitor->solicitor_id)->first();
            $solicitor->user = User::find($solicitor->solicitor_id);
        }

        return view('practice-areas.detail', compact('area', 'practiceAreas',  'solicitors'));
    }
    public function solicitors()
    {
        // Retrieve all solicitors 
        // $solicitor = Solicitor::with(['services', 'reviews'])->get();
        // return view('solicitor.index', compact('solicitor'));

        // $solicitors = Solicitor::with(['services', 'reviews'])->get();

        // Pass the solicitors data to the view
        return view('solicitor.index', compact('solicitors'));
    }

    /**
     * Show the solicitor profile.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the solicitor by id along with their related services and reviews
        $solicitor = SolicitorServices::with(['services', 'reviews'])->findOrFail($id);

        // Pass the solicitor data to the view
        return view('solicitor.profile', compact('solicitor'));
    }

    public function requestService($id)
    {
        // Logic for requesting a service
        return view('solicitors.request-service', compact('id'));
    }

    public function contactSolicitor($id)
    {
        // Logic for contacting solicitor
        return view('solicitors.contact-solicitor', compact('id'));
    }

    public function createContract($id)
    {
        // Logic for creating contract
        return view('solicitors.start-contract', compact('id'));
    }
}
