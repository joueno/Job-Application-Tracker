<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Application;
use App\Models\HRStaff;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::with(['application.jobPosting', 'hrStaff'])->get();
        return view('interviews.index', compact('interviews'));
    }

    public function create()
    {
        $applications = Application::with('jobPosting')->get();
        $hrStaff = HRStaff::all();
        return view('interviews.create', compact('applications', 'hrStaff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ApplicationID' => 'required|integer',
            'HRStaffID'     => 'required|integer',
            'DateTime'      => 'required|date',
            'Status'        => 'required|string|max:50',
            'Remarks'       => 'nullable|string',
        ]);

        Interview::create($request->all());

        return redirect()->route('interviews.index')
            ->with('success', 'Interview Created Successfully');
    }

    public function edit($id)
    {
        $interview = Interview::findOrFail($id);
        $applications = Application::with('jobPosting')->get();
        $hrStaff = HRStaff::all();
        return view('interviews.edit', compact('interview', 'applications', 'hrStaff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ApplicationID' => 'required|integer',
            'HRStaffID'     => 'required|integer',
            'DateTime'      => 'required|date',
            'Status'        => 'required|string|max:50',
            'Remarks'       => 'nullable|string',
        ]);

        $interview = Interview::findOrFail($id);
        $interview->update($request->all());

        return redirect()->route('interviews.index')
            ->with('success', 'Interview Updated Successfully');
    }

    public function destroy($id)
    {
        Interview::findOrFail($id)->delete();
        return redirect()->route('interviews.index')
            ->with('success', 'Interview Deleted Successfully');
    }
}
