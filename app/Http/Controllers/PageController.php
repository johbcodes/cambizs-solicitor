<?php

namespace App\Http\Controllers;

use App\Models\PracticeAreas;
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
        return view('practice-all');
    }

    public function practice_detail($area)
    {
        $area = PracticeAreas::where('name', $area)->pluck('name')->first();
        return view('practice-detail', compact('area'));
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
        $solicitor = Solicitor::with(['services', 'reviews'])->findOrFail($id);

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
