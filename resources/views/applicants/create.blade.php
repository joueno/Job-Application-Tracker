@extends('layouts.app')

@section('content')
    <h1>Create Applicant</h1>

    <form action="{{ route('applicants.store') }}" method="POST">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="Name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="Email" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="Phone" required><br><br>

        <button type="submit">Save Applicant</button>
    </form>

    <br>
    <a href="{{ route('applicants.index') }}">Back to Applicants</a>
@endsection
