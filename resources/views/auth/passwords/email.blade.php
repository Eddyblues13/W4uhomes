@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="card-title">Reset Password</h2>
                        <p class="text-muted">Enter your email address to receive a password reset link</p>
                    </div>

                    <div id="alert-container"></div>

                    <form id="forgot-password-form">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg" id="submit-btn">
                            Send Reset Link
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
    document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = 'Sending...';
    submitBtn.disabled = true;
    
    // Clear previous errors
    document.getElementById('email-error').textContent = '';
    document.getElementById('email').classList.remove('is-invalid');
    
    const formData = new FormData(this);
    
    fetch('{{ route("password.email") }}', {
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
            document.getElementById('forgot-password-form').reset();
        } else {
            if (data.errors) {
                // Handle validation errors
                if (data.errors.email) {
                    document.getElementById('email').classList.add('is-invalid');
                    document.getElementById('email-error').textContent = data.errors.email[0];
                }
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