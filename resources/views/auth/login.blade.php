@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 80px; font-size: 14px;">

    <h3 class="text-center mb-4" style="font-size: 22px;">Login</h3>

    @if($errors->any())
        <div class="alert alert-danger py-2">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Login</button>
    </form>

</div>
@endsection
