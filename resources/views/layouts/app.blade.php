<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentLink</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* 🌍 GLOBAL FONT SIZE */
        body {
            font-size: 15px;
            background-color: #f8f9fa;
        }

        /* 🔥 UNIVERSAL FONT OVERRIDE — applies to ALL modules */
        body, 
        body * {
            font-size: 15px !important;
        }

        /* 🔥 GLOBAL TABLE FONT SIZE OVERRIDE */
        table, 
        table * {
            font-size: 15px !important;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #2c3e50;
        }
        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 12px 18px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #34495e;
            color: #fff;
        }
        .sidebar h4 {
            color: #ecf0f1;
            padding: 20px 18px;
            margin: 0;
            font-size: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .content-area {
            padding: 30px;
        }

        /* ⭐ FIX FOR CONSISTENT SIDEBAR WIDTH ACROSS ALL MODULES */
        .module-wrapper {
            width: 100%;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
</head>
<body>

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@if(Auth::check())
<div class="d-flex">

    {{-- SIDEBAR --}}
    <div class="sidebar d-flex flex-column">
        <h4>TalentLink</h4>

        <nav class="nav flex-column mt-3">

            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a class="nav-link {{ request()->routeIs('applicants.*') ? 'active' : '' }}"
               href="{{ route('applicants.index') }}">
                Applicants
            </a>

            <a class="nav-link {{ request()->routeIs('job-postings.*') ? 'active' : '' }}"
               href="{{ route('job-postings.index') }}">
                Job Postings
            </a>

            <a class="nav-link {{ request()->routeIs('applications.*') ? 'active' : '' }}"
               href="{{ route('applications.index') }}">
                Applications
            </a>

            <a class="nav-link {{ request()->routeIs('interviews.*') ? 'active' : '' }}"
               href="{{ route('interviews.index') }}">
                Interviews
            </a>

            @if(Auth::user()->role === 'admin')
                <a class="nav-link {{ request()->routeIs('hr-staff.*') ? 'active' : '' }}"
                   href="{{ route('hr-staff.index') }}">
                    HR Staff
                </a>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="mt-auto p-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>

        </nav>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="flex-grow-1 content-area">
        @yield('content')
    </div>

</div>

@else
    {{-- LOGIN PAGE --}}
    <div class="container py-5">
        @yield('content')
    </div>
@endif

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
