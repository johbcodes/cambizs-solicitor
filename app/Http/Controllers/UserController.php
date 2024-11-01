<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getServiceRequests()
    {
        $service_requests = ServiceRequest::where('client_id', Auth::user()->id)->get();
        return view('service-requests.index', compact('service_requests'));
    }
}
