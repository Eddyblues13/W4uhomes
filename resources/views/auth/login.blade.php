@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body p-5">
          <div class="text-center mb-4">
            <h2 class="card-title">Sign In</h2>
            <p class="text-muted">Access your account to view property details</p>
          </div>

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
            @endforeach
          </div>
          @endif

          @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required autofocus>
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
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg">Sign In</button>
          </form>

          <div class="text-center mt-3">
            <p class="mb-0">
              <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
            </p>
          </div>

          <div class="text-center mt-4">
            <p class="mb-0">Don't have an account?
              <a href="{{ route('register') }}" class="text-decoration-none">Sign up here</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection