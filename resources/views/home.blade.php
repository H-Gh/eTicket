@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="main-content">
            <a class="button primary mb-4" href="{{ route("ticket.new") }}"><i class="fas fa-plus"></i> {{ __("ticket.New Ticket") }}</a>
            <div class="box rounded">
                <div class="title">{{ __("ticket.Tickets list") }}</div>

                <div class="content">

                </div>
            </div>
        </div>
    </div>
@endsection
