@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Job Postings</h2>

    <a href="{{ route('job-postings.create') }}" class="btn btn-primary mb-3">Create New Job</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Requirements</th>
                <th>Status</th>
                <th>Created</th>
                <th style="width: 20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->Title }}</td>
                    <td>{{ $job->Department }}</td>
                    <td>{{ $job->Requirements }}</td>
                    <td>{{ $job->Status }}</td>
                    <td>{{ $job->created_at }}</td>
                    <td>
                        <a href="{{ route('job-postings.edit', $job->JobPostingID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('job-postings.destroy', $job->JobPostingID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this job?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
