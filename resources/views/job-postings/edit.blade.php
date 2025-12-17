@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job Posting</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('job-postings.update', $job->JobPostingID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" value="{{ $job->Title }}" required>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="Department" class="form-control" value="{{ $job->Department }}" required>
        </div>

        <div class="mb-3">
            <label>Requirements</label>
            <textarea name="Requirements" class="form-control" rows="4" required>{{ $job->Requirements }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" value="{{ $job->Status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
        <a href="{{ route('job-postings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
