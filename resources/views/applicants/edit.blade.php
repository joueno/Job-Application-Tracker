@extends('layouts.app')

@section('content')
    <h1>Edit Applicant</h1>

    <form action="{{ route('applicants.update', $applicant->ApplicantID) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="Name" value="{{ $applicant->Name }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="Email" value="{{ $applicant->Email }}" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="Phone" value="{{ $applicant->Phone }}" required><br><br>

        <button type="submit">Update Applicant</button>
    </form>

    <br>
    <a href="{{ route('applicants.index') }}">Back to Applicants</a>
@endsection
