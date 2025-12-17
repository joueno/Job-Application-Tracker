<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicant;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        // Load applications with related applicant + job posting
        $applications = Application::with(['applicant', 'jobPosting'])->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        // Load applicants and job postings for dropdowns
        $applicants = Applicant::all();
        $jobPostings = JobPosting::all();

        return view('applications.create', compact('applicants', 'jobPostings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ApplicantID'   => 'required|integer',
            'JobPostingID'  => 'required|integer',
            'ApplicationDate' => 'required|date',
            'Status'        => 'required|string|max:50',
            'Remarks'       => 'nullable|string',
        ]);

        Application::create([
            'ApplicantID'     => $request->ApplicantID,
            'JobPostingID'    => $request->JobPostingID,
            'ApplicationDate' => $request->ApplicationDate,
            'Status'          => $request->Status,
            'Remarks'         => $request->Remarks,
        ]);

        return redirect()->route('applications.index')
            ->with('success', 'Application Created Successfully');
    }

    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $applicants = Applicant::all();
        $jobPostings = JobPosting::all();

        return view('applications.edit', compact('application', 'applicants', 'jobPostings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ApplicantID'   => 'required|integer',
            'JobPostingID'  => 'required|integer',
            'ApplicationDate' => 'required|date',
            'Status'        => 'required|string|max:50',
            'Remarks'       => 'nullable|string',
        ]);

        $application = Application::findOrFail($id);

        $application->update([
            'ApplicantID'     => $request->ApplicantID,
            'JobPostingID'    => $request->JobPostingID,
            'ApplicationDate' => $request->ApplicationDate,
            'Status'          => $request->Status,
            'Remarks'         => $request->Remarks,
        ]);

        return redirect()->route('applications.index')
            ->with('success', 'Application Updated Successfully');
    }

    public function destroy($id)
    {
        Application::findOrFail($id)->delete();

        return redirect()->route('applications.index')
            ->with('success', 'Application Deleted Successfully');
    }
}
