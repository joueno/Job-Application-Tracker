<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the applicants.
     */
    public function index()
    {
        $applicants = Applicant::all();
        return view('applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new applicant.
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created applicant in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Phone' => 'required',
            'Resume' => 'nullable',
        ]);

        Applicant::create($request->only([
            'Name',
            'Email',
            'Phone',
            'Resume'
        ]));

        return redirect()->route('applicants.index')
            ->with('success', 'Applicant Created Successfully');
    }

    /**
     * Show the form for editing the specified applicant.
     */
    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified applicant in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Phone' => 'required',
            'Resume' => 'nullable',
        ]);

        $applicant = Applicant::findOrFail($id);

        $applicant->update($request->only([
            'Name',
            'Email',
            'Phone',
            'Resume'
        ]));

        return redirect()->route('applicants.index')
            ->with('success', 'Applicant Updated Successfully');
    }

    /**
     * Remove the specified applicant from storage.
     */
    public function destroy($id)
    {
        Applicant::findOrFail($id)->delete();

        return redirect()->route('applicants.index')
            ->with('success', 'Applicant Deleted Successfully');
    }
}
