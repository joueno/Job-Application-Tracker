@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Job Posting</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('job-postings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <input type="text" name="Department" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Requirements</label>
            <textarea name="Requirements" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Post Job</button>
        <a href="{{ route('job-postings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
