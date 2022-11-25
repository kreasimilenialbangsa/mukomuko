@extends('admin.layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')
    <div class="p-4 m-3 w-100">
        <div class="text-center">
            <img src="{{ asset('img/logo-nu.png') }}" alt="logo" class="mb-5 mt-2">
        </div>
        {{-- <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Stisla</span></h4>
        <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p> --}}
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger p-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" required autofocus>
            <div class="invalid-feedback">
                {{ $errors->first('email') ? $errors->first('email') : 'Please fill in your email'  }}
            </div>
        </div>

        <div class="form-group">
            <div class="d-block">
            <label for="password" class="control-label">Password</label>
            </div>
            <input id="password" type="password" class="form-control" name="password" tabindex="2" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}" required>
            <div class="invalid-feedback">
                {{ $errors->first('password') ? $errors->first('password') : 'please fill in your password' }}
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
        </div>

        <div class="form-group text-right">
            <a href="{{ route('forgot-password') }}" class="float-left mt-3">
            Forgot Password?
            </a>
            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
            Login
            </button>
        </div>

        {{-- <div class="mt-5 text-center">
            Don't have an account? <a href="auth-register.html">Create new one</a>
        </div> --}}
        </form>

        <div class="text-center mt-5 text-small">
        Copyright &copy; LazisNU Mukomuko. Made with 💙 by Digihave Indonesia
        {{-- <div class="mt-2">
            <a href="#">Privacy Policy</a>
            <div class="bullet"></div>
            <a href="#">Terms of Service</a>
        </div> --}}
        </div>
    </div>
@endsection
