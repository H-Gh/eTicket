@extends('layouts.backend')
@include("ticket.backend._css")
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("ticket.Ticket #:number", ["number" => $ticket->id])])
        @include("notifications")
        <div class="main-content">
            <div class="action-buttons-container">
                @can("ticket.edit")
                    <a class="button primary" href="{{ route("admin.ticket.edit", ["ticket" => $ticket->id]) }}">
                        {{ __("ticket.Edit ticket") }}
                    </a>
                @endcan
                @can("ticket.remove")
                    <a class="button danger" href="{{ route("admin.ticket.destroy", ["ticket" => $ticket->id]) }}">
                        {{ __("ticket.Remove ticket") }}
                    </a>
                @endcan
            </div>
            <div class="box rounded">
                <div class="content">
                    @include("ticket.common._show")
                </div>
            </div>
        </div>
    </div>
@endsection
