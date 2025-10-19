@extends('layouts.guest')

@section('content')
<h3 class="mb-4">Student Login</h3>
<form method="POST" action="{{ route('student.login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required autofocus>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>
    </div>
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary">
            Login
        </button>
        <a href="{{ route('student.register') }}" class="btn btn-link">
            Create an account
        </a>
    </div>
</form>
@endsection
