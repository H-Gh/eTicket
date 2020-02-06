<form action="{{ route("admin.ticket.update", ["ticket" => $ticket->id]) }}" method="POST">
    <div class="container-fluid">
        <div class="row">
            @csrf
            @include("ticket.backend._form-main-column")
            @include("ticket.backend._form-side-column")
        </div>
    </div>
    <div class="submit-button-container">
        <button type="submit" class="button primary">{{ __("common.Send") }}</button>
    </div>
</form>