<div class="col-s-12 col-md-12 col-lg-9 col-xl-9 ticket-title-and-text">
    <div class="form-group">
        <label for="ticket-title">{{ __("common.Title") }}</label>
        <input
                id="ticket-title"
                type="text"
                name="title"
                value="{{ old("title", isset($ticket) ? $ticket->title : "") }}"
                @cannot("ticket.edit.content")
                disabled
                @endcannot
        />
        @error("title")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="ticket-text">{{ __("common.Text") }}</label>
        <textarea
                name="text"
                id="ticket-text"
                rows="5"
                @cannot("ticket.edit.content")
                disabled
                            @endcannot
                    >{{ old("text", isset($ticket) ? $ticket->text : "") }}</textarea>
        @error("text")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="ticket-answer">{{ __("ticket.Answer") }}</label>
        <textarea name="answer" id="ticket-answer" rows="5"
        >{{ old("answer", isset($ticket) ? $ticket->answer : "") }}</textarea>
        @error("answer")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
</div>