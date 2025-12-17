@extends('layouts.app')

@section('content')
<div class="container">
    <h2>HR Staff List</h2>

    <a href="{{ route('hr-staff.create') }}" class="btn btn-primary mb-3">Add HR Staff</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Role</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($staff as $person)
                <tr>
                    <td>{{ $person->Name }}</td>
                    <td>{{ $person->Email }}</td>
                    <td>{{ $person->Department }}</td>
                    <td>{{ $person->Role }}</td>
                    <td>{{ $person->Status }}</td>
                    <td>{{ $person->Remarks }}</td>
                    <td>
                        <a href="{{ route('hr-staff.edit', $person->HRStaffID) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('hr-staff.destroy', $person->HRStaffID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this staff member?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">No HR staff found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
