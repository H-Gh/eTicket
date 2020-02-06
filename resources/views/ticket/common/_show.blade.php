<div class="container-fluid">
    <div class="row">
        <div class="col-s-12 col-md-12 col-lg-9 col-xl-9 ticket-title-and-text">
            <table class="table-striped">
                <tr>
                    <td class="font-weight-bold" style="width: 50px">{{ __("common.Title") }}</td>
                    <td>{{ $ticket->title }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">{{ __("common.Text") }}</td>
                    <td>{{ $ticket->text }}</td>
                </tr>
                @if (!empty($ticket->answered_at))
                    <tr>
                        <td class="font-weight-bold">{{ __("ticket.Answer") }}</td>
                        <td>{{ $ticket->answer }}</td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="col-s-12 col-md-12 col-lg-3 col-xl-3 ticket-info">
            <table class="table-striped">
                <tr>
                    <td>{{ __("common.Created at") }}</td>
                    <td>{{ $ticket->created_at }}</td>
                </tr>
                <tr>
                    <td>{{ __("common.Status") }}</td>
                    <td class="
                                        @if ($ticket->status === App\Ticket::PENDING)
                            text primary
@elseif ($ticket->status === \App\Ticket::REJECTED)
                            text danger
@elseif ($ticket->status === \App\Ticket::ANSWERED)
                            text success
@endif
                            ">{{ __("ticket." . $ticket->status) }}</td>
                </tr>
                @if(!empty($ticket->answered_at))
                    <tr>
                        <td>{{ __("ticket.Answered at") }}</td>
                        <td>{{ $ticket->answered_at }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("ticket.Answered by") }}</td>
                        <td>{{ $ticket->answeredBy->name }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</div>