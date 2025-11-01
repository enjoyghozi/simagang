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

    .verify-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: #fff;
        animation: fadeIn 0.6s ease-in-out;
        width: 100%;
        max-width: 450px;
        text-align: center;
    }

    .verify-header {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .verify-text {
        color: #eaeaea;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .btn-resend {
        background: #00e1ff;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px 20px;
        border: none;
        transition: 0.3s ease-in-out;
    }

    .btn-resend:hover {
        background: #00b6cc;
        transform: scale(1.05);
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

<div class="verify-card">
    <div class="verify-header">{{ __('Verify Your Email Address') }}</div>

    @if (session('resent'))
        <div class="alert" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <p class="verify-text">
        {{ __('Before proceeding, please check your email for a verification link.') }}<br>
        {{ __('If you did not receive the email, you can request another one below.') }}
    </p>

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn-resend">
            {{ __('Resend Verification Email') }}
        </button>
    </form>
</div>
@endsection
