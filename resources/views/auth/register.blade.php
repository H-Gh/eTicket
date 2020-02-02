@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Register') }}</div>
            <div class="description">
                {{ __("auth.To register, please enter your name, email and password") }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="{{ __('auth.Name and family') }}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email"
                           placeholder="{{ __('auth.E-Mail Address') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password" type="password" class="@error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password" placeholder="{{ __('auth.Password') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class="" name="password_confirmation" required
                           autocomplete="new-password" placeholder="{{ __('auth.Confirm Password') }}">

                    <button type="submit" class="button primary">
                        {{ __('auth.Register') }}
                    </button>
                    @if (Route::has('login'))
                        <div class="mt-4">
                            <a href="{{ route('login') }}">
                                {{ __("auth.Have account? Login") }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
