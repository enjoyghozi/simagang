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

    .forgot-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: #fff;
        animation: fadeIn 0.6s ease-in-out;
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .forgot-header {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .forgot-text {
        color: #eaeaea;
        margin-bottom: 20px;
        line-height: 1.6;
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
        display: block;
        text-align: left;
    }

    .btn-reset {
        background: #00e1ff;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px;
        width: 100%;
        transition: 0.3s ease-in-out;
        border: none;
    }

    .btn-reset:hover {
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

    .alert {
        background-color: rgba(0, 255, 127, 0.2);
        border: 1px solid #00ffbb;
        border-radius: 10px;
        padding: 10px;
        color: #eaffea;
        margin-bottom: 15px;
        font-size: 14px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="forgot-card">
    <div class="forgot-header">{{ __('Forgot Password') }}</div>

    @if (session('status'))
        <div class="alert" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <p class="forgot-text">
        {{ __('Masukkan alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password Anda.') }}
    </p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3 text-start">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn-reset">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>

        <div class="text-center">
            <a class="login-link" href="{{ route('login') }}">
                {{ __('Kembali ke Login') }}
            </a>
        </div>
    </form>
</div>
@endsection
