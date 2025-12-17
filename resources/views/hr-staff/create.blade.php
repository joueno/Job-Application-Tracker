@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add HR Staff</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('hr-staff.store') }}" method="POST">
        @csrf

        <div class="mb-3"><label>Name</label><input type="text" name="Name" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="Email" class="form-control" required></div>
        <div class="mb-3"><label>Department</label><input type="text" name="Department" class="form-control" required></div>
        <div class="mb-3"><label>Role</label><input type="text" name="Role" class="form-control" required></div>
        <div class="mb-3"><label>Status</label><input type="text" name="Status" class="form-control" required></div>
        <div class="mb-3"><label>Remarks</label><textarea name="Remarks" class="form-control" rows="3"></textarea></div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('hr-staff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
