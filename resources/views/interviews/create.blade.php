@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Add Interview</h3>

    <form action="{{ route('interviews.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Application</label>
            <select name="ApplicationID" class="form-select" required>
                <option value="">Select Application</option>
                @foreach($applications as $app)
                    <option value="{{ $app->ApplicationID }}">
                        {{ $app->ApplicantName }} — {{ $app->jobPosting->Title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">HR Staff</label>
            <select name="HRStaffID" class="form-select" required>
                <option value="">Select HR Staff</option>
                @foreach($hrStaff as $staff)
                    <option value="{{ $staff->HRStaffID }}">{{ $staff->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date & Time</label>
            <input type="datetime-local" name="DateTime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="Status" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="Remarks" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('interviews.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

</div>
@endsection
