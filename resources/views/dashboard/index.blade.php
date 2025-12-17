@extends('layouts.app')

@section('content')
<div class="container" style="font-size: 14px;">

    <h3 class="mb-4" style="font-size: 20px;">Dashboard</h3>

    <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    ">

        <!-- Applicants -->
        <div class="card shadow-sm border-0 p-3">
            <div style="font-size: 16px; text-align: left;">Applicants</div>
            <div style="font-size: 32px; font-weight: 600; text-align: center;">
                {{ $applicants }}
            </div>
            <div class="text-center mt-2">
                <a href="/applicants" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>

        <!-- Job Postings -->
        <div class="card shadow-sm border-0 p-3">
            <div style="font-size: 16px; text-align: left;">Job Postings</div>
            <div style="font-size: 32px; font-weight: 600; text-align: center;">
                {{ $jobPostings }}
            </div>
            <div class="text-center mt-2">
                <a href="/job-postings" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>

        <!-- Applications -->
        <div class="card shadow-sm border-0 p-3">
            <div style="font-size: 16px; text-align: left;">Applications</div>
            <div style="font-size: 32px; font-weight: 600; text-align: center;">
                {{ $applications }}
            </div>
            <div class="text-center mt-2">
                <a href="/applications" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>

        <!-- Interviews -->
        <div class="card shadow-sm border-0 p-3">
            <div style="font-size: 16px; text-align: left;">Interviews</div>
            <div style="font-size: 32px; font-weight: 600; text-align: center;">
                {{ $interviews }}
            </div>
            <div class="text-center mt-2">
                <a href="/interviews" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>

        <!-- HR Staff -->
        <div class="card shadow-sm border-0 p-3">
            <div style="font-size: 16px; text-align: left;">HR Staff</div>
            <div style="font-size: 32px; font-weight: 600; text-align: center;">
                {{ $hrStaff }}
            </div>
            <div class="text-center mt-2">
                <a href="/hr-staff" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>

    </div>

</div>
@endsection
