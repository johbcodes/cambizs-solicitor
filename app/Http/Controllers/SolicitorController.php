<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitorController extends Controller
{
    public function getPracticeAreas()
    {
        return view('solicitor.practice-areas.index');
    }
    public function createPracticeAreas()
    {
        return view('solicitor.practice-areas.create');
    }
}
