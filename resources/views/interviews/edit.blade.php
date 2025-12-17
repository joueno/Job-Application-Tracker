@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Edit Interview</h3>

    <form action="{{ route('interviews.update', $interview->InterviewID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Application</label>
            <select name="ApplicationID" class="form-select" required>
                @foreach($applications as $app)
                    <option value="{{ $app->ApplicationID }}"
                        {{ $interview->ApplicationID == $app->ApplicationID ? 'selected' : '' }}>
                        {{ $app->ApplicantName }} — {{ $app->jobPosting->Title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">HR Staff</label>
            <select name="HRStaffID" class="form-select" required>
                @foreach($hrStaff as $staff)
                    <option value="{{ $staff->HRStaffID }}"
                        {{ $interview->HRStaffID == $staff->HRStaffID ? 'selected' : '' }}>
                        {{ $staff->Name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date & Time</label>
            <input type="datetime-local" name="DateTime" class="form-control"
                   value="{{ date('Y-m-d\TH:i', strtotime($interview->DateTime)) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="Status" class="form-control" value="{{ $interview->Status }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="Remarks" class="form-control">{{ $interview->Remarks }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('interviews.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

</div>
@endsection
