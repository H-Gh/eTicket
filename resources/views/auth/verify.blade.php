@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.verify_email_address_text') }}</div>
            <div class="description">
                {{ __('auth.check_email_for_verification_link_text') }}
            </div>
            <div class="form">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('auth.resend_verification_email_text') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="button primary">{{ __('auth.send_verification_link_button_text') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
