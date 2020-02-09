@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="title">{{ __("ticket.new_ticket_text") }}</div>
                <div class="content">
                    @include("ticket.frontend._form")
                </div>
            </div>
        </div>
    </div>
@endsection
