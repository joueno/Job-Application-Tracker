@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Interviews</h3>
        <a href="{{ route('interviews.create') }}" class="btn btn-primary btn-sm">+ Add Interview</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle w-100">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Applicant</th>
                <th>Job Posting</th>
                <th>Date</th>
                <th>HR Staff</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($interviews as $interview)
            <tr>
                <td>{{ $interview->InterviewID }}</td>

                {{-- Applicant Name (CORRECT RELATIONSHIP) --}}
                <td>{{ $interview->application->applicant->Name ?? 'N/A' }}</td>

                {{-- Job Posting Title --}}
                <td>{{ $interview->application->jobPosting->Title ?? 'N/A' }}</td>

                {{-- Interview Date --}}
                <td>{{ $interview->DateTime ?? 'N/A' }}</td>

                {{-- HR Staff --}}
                <td>{{ $interview->hrStaff->Name ?? 'N/A' }}</td>

                <td class="text-center">
                    <a href="{{ route('interviews.edit', $interview->InterviewID) }}" 
                       class="btn btn-warning btn-sm me-1">Edit</a>

                    <form action="{{ route('interviews.destroy', $interview->InterviewID) }}" 
                          method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this interview?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-3">
                    No interviews found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
