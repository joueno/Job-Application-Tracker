@extends('layouts.app')

@section('content')
    <h1>Edit Application</h1>

    <form action="{{ route('applications.update', $application->ApplicationID) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Applicant:</label><br>
        <select name="ApplicantID" required>
            @foreach($applicants as $applicant)
                <option value="{{ $applicant->ApplicantID }}"
                    {{ $application->ApplicantID == $applicant->ApplicantID ? 'selected' : '' }}>
                    {{ $applicant->Name }}
                </option>
            @endforeach
        </select><br><br>

        <label>Job Posting:</label><br>
        <select name="JobPostingID" required>
            @foreach($jobPostings as $job)
                <option value="{{ $job->JobPostingID }}"
                    {{ $application->JobPostingID == $job->JobPostingID ? 'selected' : '' }}>
                    {{ $job->Title }}
                </option>
            @endforeach
        </select><br><br>

        <label>Status:</label><br>
        <select name="Status" required>
            <option value="Pending" {{ $application->Status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Reviewed" {{ $application->Status == 'Reviewed' ? 'selected' : '' }}>Reviewed</option>
            <option value="Rejected" {{ $application->Status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select><br><br>

        <label>Application Date:</label><br>
        <input type="date" name="ApplicationDate" value="{{ $application->ApplicationDate }}" required><br><br>

        <label>Remarks:</label><br>
        <textarea name="Remarks">{{ $application->Remarks }}</textarea><br><br>

        <button type="submit">Update Application</button>
    </form>

    <br>
    <a href="{{ route('applications.index') }}">Back</a>
@endsection
