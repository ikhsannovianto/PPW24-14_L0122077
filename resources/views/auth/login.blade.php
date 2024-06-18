@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Alert Sukses -->
    @if (session('success'))
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm rounded-pill mb-3" role="alert" style="max-width: 100%; width: auto;">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div class="text-center flex-grow-1">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 5000);
    </script>
    @endif
    <div class="row justify-content-center align-items-center min-vh-60">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg p-5">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-bold my-4">{{ __('Login') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        </div>
                    </form>

                    <!-- Navigasi ke Halaman Registrasi -->
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
