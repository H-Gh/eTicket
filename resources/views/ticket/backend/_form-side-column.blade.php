<div class="col-s-12 col-md-12 col-lg-3 col-xl-3 ticket-info">
    <div class="form-group">
        <label for="ticket-created-by">{{ __("ticket.created_by_text") }}</label>
        <select id="ticket-created-by" type="text" name="created_by"
                @cannot("ticket.edit.content")
                disabled
                @endcannot
        >
            @foreach($users as $user)
                <option
                        value="{{ $user->id }}"
                        @if(old("created_by", isset($ticket) ? $ticket->created_by : null) == $user->id ? "selected" : "") selected @endif>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ticket-created-at">{{ __("common.created_at_text") }}</label>
        <input id="ticket-created-at" type="text" name="created_at"
               value="{{ $ticket->created_at }}"
               @cannot("ticket.edit.content")
               disabled
                @endcannot
        />
    </div>
    <div class="form-group">
        <label for="ticket-status">{{ __("common.status_text") }}</label>
        <select id="ticket-status" name="status">
            <option
                    value="{{ \App\Ticket::PENDING }}"
                    {{ old("status", isset($ticket) ? $ticket->status : null) == \App\Ticket::PENDING ? "selected" : "" }}
            >
                {{ __("ticket." . \App\Ticket::PENDING) }}
            </option>
            <option
                    value="{{ \App\Ticket::REJECTED }}"
                    {{ old("status", isset($ticket) ? $ticket->status : null) == \App\Ticket::REJECTED ? "selected" : "" }}
            >
                {{ __("ticket." . \App\Ticket::REJECTED) }}
            </option>
            <option
                    value="{{ \App\Ticket::ANSWERED }}"
                    {{ old("status", isset($ticket) ? $ticket->status : null) == \App\Ticket::ANSWERED ? "selected" : "" }}
            >
                {{ __("ticket." . \App\Ticket::ANSWERED) }}
            </option>
        </select>
    </div>
</div>