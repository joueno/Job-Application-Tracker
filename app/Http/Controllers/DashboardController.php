<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Interview;
use App\Models\HRStaff;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'applicants' => Applicant::count(),
            'jobPostings' => JobPosting::count(),
            'applications' => Application::count(),
            'interviews' => Interview::count(),
            'hrStaff' => HRStaff::count(),
        ]);
    }
}
