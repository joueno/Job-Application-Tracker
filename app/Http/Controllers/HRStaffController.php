<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HRStaff;

class HRStaffController extends Controller
{
    public function index()
    {
        $staff = HRStaff::all();
        return view('hr-staff.index', compact('staff'));
    }

    public function create()
    {
        return view('hr-staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Department' => 'required|string|max:255',
            'Role' => 'required|string|max:100',
            'Status' => 'required|string|max:50',
            'Remarks' => 'nullable|string',
        ]);

        HRStaff::create($request->all());

        return redirect()->route('hr-staff.index')->with('success', 'HR Staff added successfully.');
    }

    public function edit($id)
    {
        $staff = HRStaff::findOrFail($id);
        return view('hr-staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = HRStaff::findOrFail($id);

        $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Department' => 'required|string|max:255',
            'Role' => 'required|string|max:100',
            'Status' => 'required|string|max:50',
            'Remarks' => 'nullable|string',
        ]);

        $staff->update($request->all());

        return redirect()->route('hr-staff.index')->with('success', 'HR Staff updated successfully.');
    }

    public function destroy($id)
    {
        $staff = HRStaff::findOrFail($id);
        $staff->delete();

        return redirect()->route('hr-staff.index')->with('success', 'HR Staff deleted successfully.');
    }
}
