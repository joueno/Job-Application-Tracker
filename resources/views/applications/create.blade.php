@extends('layouts.app')

@section('content')
    <h1>Create Application</h1>

    <form action="{{ route('applications.store') }}" method="POST">
        @csrf

        <label>Applicant:</label><br>
        <select name="ApplicantID" required>
            @foreach($applicants as $applicant)
                <option value="{{ $applicant->ApplicantID }}">{{ $applicant->Name }}</option>
            @endforeach
        </select><br><br>

        <label>Job Posting:</label><br>
        <select name="JobPostingID" required>
            @foreach($jobPostings as $job)
                <option value="{{ $job->JobPostingID }}">{{ $job->Title }}</option>
            @endforeach
        </select><br><br>

        <label>Status:</label><br>
        <select name="Status" required>
            <option value="Pending">Pending</option>
            <option value="Reviewed">Reviewed</option>
            <option value="Rejected">Rejected</option>
        </select><br><br>

        <label>Application Date:</label><br>
        <input type="date" name="ApplicationDate" required><br><br>

        <label>Remarks:</label><br>
        <textarea name="Remarks"></textarea><br><br>

        <button type="submit">Save Application</button>
    </form>

    <br>
    <a href="{{ route('applications.index') }}">Back</a>
@endsection
