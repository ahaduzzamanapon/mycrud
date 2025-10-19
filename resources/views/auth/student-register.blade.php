@extends('layouts.guest')

@section('content')
<h3 class="mb-4">Student Registration</h3>
<form method="POST" action="{{ route('student.register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required autofocus>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
    </div>
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
        <a href="{{ route('student.login') }}" class="btn btn-link">
            Already have an account?
        </a>
    </div>
</form>
@endsection
