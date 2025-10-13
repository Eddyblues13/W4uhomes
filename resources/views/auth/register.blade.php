@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body p-5">
          <div class="text-center mb-4">
            <h2 class="card-title">Create Account</h2>
            <p class="text-muted">Sign up to access exclusive property details</p>
          </div>

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
            @endforeach
          </div>
          @endif

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required autofocus>
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" required>
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <div class="form-text">Password must be at least 8 characters long.</div>
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                required>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
              <label class="form-check-label" for="terms">
                I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#"
                  class="text-decoration-none">Privacy Policy</a>
              </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg">Create Account</button>
          </form>

          <div class="text-center mt-4">
            <p class="mb-0">Already have an account?
              <a href="{{ route('login') }}" class="text-decoration-none">Sign in here</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection