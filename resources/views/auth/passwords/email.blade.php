@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Reset Password') }}</div>
            <div class="description">
                {{ __("auth.To reset password, please enter your email.") }}
            </div>
            <div class="form">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('auth.E-Mail Address') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <button type="submit" class="button primary">
                        {{ __('auth.Send Password Reset Link') }}
                    </button>
                    @if (Route::has('login'))
                        <div class="mt-4">
                            <a href="{{ route('login') }}">
                                {{ __("auth.Have account? Login") }}
                            </a>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="mt-2">
                            <a href="{{ route('register') }}">
                                {{ __("auth.Don't have account? Register") }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
