@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="action-buttons-container">
                @can("ticket.add")
                    <a class="button primary" href="{{ route("ticket.create") }}">
                        <i class="fas fa-plus"></i> {{ __("ticket.New ticket") }}
                    </a>
                @endcan
            </div>
            <div class="box rounded">
                <div class="title">{{ __("ticket.Tickets list") }}</div>
                <div class="content">
                    @include("ticket.common._list")
                </div>
            </div>
        </div>
    </div>
@endsection
