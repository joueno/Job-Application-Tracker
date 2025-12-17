@extends('layouts.app')

@section('content')
<div class="container" style="font-size: 14px;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0" style="font-size: 20px;">Applications</h3>
        <a href="{{ route('applications.create') }}" class="btn btn-primary btn-sm">+ Add Application</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success py-2 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle"
           style="font-size: 14px; table-layout: fixed; width: 100%;">
        <thead class="table-light">
            <tr>
                <th style="width: 10%; text-align: left;">ID</th>
                <th style="width: 30%; text-align: left;">Applicant</th>
                <th style="width: 25%; text-align: left;">Job Posting</th>
                <th style="width: 20%; text-align: left;">Status</th>
                <th style="width: 15%; text-align: left;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($applications as $app)
            <tr>
                <td class="text-center align-middle" style="width: 10%;">{{ $app->ApplicationID }}</td>
                <td class="align-middle" style="width: 30%; text-align: left;">
                    {{ $app->applicant->Name ?? 'N/A' }}
                </td>
                <td class="align-middle" style="width: 25%; text-align: left;">
                    {{ $app->jobPosting->Title ?? 'N/A' }}
                </td>
                <td class="align-middle" style="width: 20%; text-align: left;">
                    {{ $app->Status }}
                </td>
                <td class="text-center align-middle" style="width: 15%;">
                    <a href="{{ route('applications.edit', $app->ApplicationID) }}" 
                       class="btn btn-warning btn-sm me-1">Edit</a>

                    <form action="{{ route('applications.destroy', $app->ApplicationID) }}" 
                          method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this application?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-3 align-middle">
                    No applications found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
