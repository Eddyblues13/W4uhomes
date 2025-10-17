@extends('layouts.app')

@section('title', 'Set New Password')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="card-title">Set New Password</h2>
                        <p class="text-muted">Enter your new password below</p>
                    </div>

                    <div id="alert-container"></div>

                    <form id="reset-password-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $email }}"
                                required readonly>
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback" id="password-error"></div>
                            <div class="form-text">Password must be at least 8 characters long.</div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                            <div class="invalid-feedback" id="password_confirmation-error"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg" id="submit-btn">
                            Reset Password
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">
                            <a href="{{ route('login') }}" class="text-decoration-none">Back to Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('reset-password-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = 'Resetting...';
    submitBtn.disabled = true;
    
    // Clear previous errors
    const errorElements = document.querySelectorAll('.invalid-feedback');
    errorElements.forEach(element => element.textContent = '');
    
    const inputElements = document.querySelectorAll('.form-control');
    inputElements.forEach(element => element.classList.remove('is-invalid'));
    
    const formData = new FormData(this);
    
    fetch('{{ route("password.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        const alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = '';
        
        if (data.success) {
            alertContainer.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${data.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            
            // Redirect to login after 3 seconds
            setTimeout(() => {
                window.location.href = '{{ route("login") }}';
            }, 3000);
        } else {
            if (data.errors) {
                // Handle validation errors
                Object.keys(data.errors).forEach(field => {
                    const input = document.getElementById(field);
                    const errorElement = document.getElementById(field + '-error');
                    if (input && errorElement) {
                        input.classList.add('is-invalid');
                        errorElement.textContent = data.errors[field][0];
                    }
                });
            } else {
                alertContainer.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                An unexpected error occurred. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
    })
    .finally(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>
@endsection