@extends('layouts.backend')
@include("ticket.backend._css")
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("ticket.edit_ticket_with_number_text", ["number" => $ticket->id])])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    <form action="{{ route("admin.ticket.update", ["ticket" => $ticket->id]) }}" method="POST">
                        <div class="container-fluid">
                            <div class="row">
                                @csrf
                                @method("PUT")
                                @include("ticket.backend._form-main-column")
                                @include("ticket.backend._form-side-column")
                            </div>
                        </div>
                        <div class="submit-button-container">
                            <button type="submit" class="button primary">{{ __("common.send_text") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
