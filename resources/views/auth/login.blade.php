@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    /* Card login */
    .login-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: #fff;
        animation: fadeIn 0.6s ease-in-out;
        width: 100%;
        max-width: 400px; /* agar tidak terlalu melebar di desktop */
    }

    .login-header {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff;
        border-radius: 10px;
        padding: 12px;
    }

    .form-control:focus {
        box-shadow: 0 0 8px #00e1ff;
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
    }

    label {
        color: #f1f1f1;
        font-weight: 500;
    }

    .btn-login {
        background: #00e1ff;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px;
        width: 100%;
        transition: 0.3s ease-in-out;
    }

    .btn-login:hover {
        background: #00b6cc;
        transform: scale(1.05);
    }

    .forgot-link {
        color: #00e1ff;
        text-decoration: none;
        transition: 0.3s;
    }

    .forgot-link:hover {
        color: #00b6cc;
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="login-card">
    <div class="login-header">{{ __('Login') }}</div>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   name="password" required autocomplete="current-password">
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" 
                   name="remember" id="remember" 
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        {{-- Tombol Login --}}
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-login">
                {{ __('Login') }}
            </button>
        </div>

        {{-- Lupa Password --}}
        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="forgot-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        @endif
    </form>
</div>
@endsection
