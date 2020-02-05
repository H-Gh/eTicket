@extends('layouts.frontend')
@include('.ticket.frontend._css')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="title">{{ __("ticket.Ticket #:number", ["number" => $ticket->id]) }}</div>
                <div class="content">
                    @include("ticket.common._show")
                </div>
            </div>
        </div>
    </div>
@endsection
