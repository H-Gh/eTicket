@extends('layouts.backend')
@include("ticket.backend._css")
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("ticket.ticket_with_number_text", ["number" => $ticket->id])])
        @include("notifications")
        <div class="main-content">
            <div class="action-buttons-container">
                @can("ticket.edit")
                    <a class="button primary" href="{{ route("admin.ticket.edit", ["ticket" => $ticket->id]) }}">
                        {{ __("ticket.edit_ticket_permission_text") }}
                    </a>
                @endcan
                @can("ticket.remove")
                    <a class="button danger"
                       onclick="confirm('{{ __("common.are_you_sure_text") }}');
                               document.getElementById('ticket-{{ $ticket->id }}-remove-form').submit();"
                       href="#">
                        {{ __("ticket.remove_ticket_text") }}
                    </a>
                    <form id="ticket-{{ $ticket->id }}-remove-form"
                          action="{{ route("admin.ticket.destroy", ["ticket" => $ticket->id]) }}" method="POST"
                          style="display: none;">
                        @csrf
                        @method("DELETE")
                    </form>
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
