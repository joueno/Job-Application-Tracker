<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::all();
        return view('job-postings.index', compact('jobs'));
    }

    public function create()
    {
        return view('job-postings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Department' => 'required|string|max:255',
            'Requirements' => 'required|string',
            'Status' => 'required|string|max:50',
        ]);

        JobPosting::create($request->all());

        return redirect()->route('job-postings.index')->with('success', 'Job posted successfully.');
    }

    public function edit($id)
    {
        $job = JobPosting::findOrFail($id);
        return view('job-postings.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = JobPosting::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:255',
            'Department' => 'required|string|max:255',
            'Requirements' => 'required|string',
            'Status' => 'required|string|max:50',
        ]);

        $job->update($request->all());

        return redirect()->route('job-postings.index')->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = JobPosting::findOrFail($id);
        $job->delete();

        return redirect()->route('job-postings.index')->with('success', 'Job deleted successfully.');
    }
}
