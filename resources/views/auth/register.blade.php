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

    /* Card register */
    .register-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: #fff;
        animation: fadeIn 0.6s ease-in-out;
        width: 100%;
        max-width: 420px; /* biar pas di desktop */
    }

    .register-header {
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

    .btn-register {
        background: #00e1ff;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px;
        width: 100%;
        transition: 0.3s ease-in-out;
    }

    .btn-register:hover {
        background: #00b6cc;
        transform: scale(1.05);
    }

    .login-link {
        color: #00e1ff;
        text-decoration: none;
        transition: 0.3s;
    }

    .login-link:hover {
        color: #00b6cc;
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="register-card">
    <div class="register-header">{{ __('Register') }}</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Full Name') }}</label>
            <input id="name" type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
         <div class="mb-3">
            <label for="instansi" class="form-label">{{ __('Instansi') }}</label>
            <input id="instansi" type="text"
                class="form-control @error('instansi') is-invalid @enderror"
                name="instansi" value="{{ old('instansi') }}" required autofocus>
            @error('instansi')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password" required>
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password"
                class="form-control" name="password_confirmation" required>
        </div>

        {{-- Tombol Register --}}
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-register">
                {{ __('Register') }}
            </button>
        </div>

        {{-- Link Login --}}
        <div class="text-center">
            <span>Sudah punya akun?</span>
            <a class="login-link" href="{{ route('login') }}">
                {{ __('Login di sini') }}
            </a>
        </div>
    </form>
</div>
@endsection
