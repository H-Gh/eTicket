<div class="table-responsive">
    <table class="table-striped data-table notifications-list">
        <tbody>
        @forelse($notifications as $notification)
            <tr>
                <td>
                    <a @if(!empty($notification->read_at)) class="read"
                       @endif href="{{ route("notification.show", ["notification" => $notification->id]) }}">
                        {{ ($notification->type)::formatType() }}
                    </a>
                    <div class="icons">
                        @if(empty($notification->read_at))
                            <a href="{{ route("notification.read", ["notification" => $notification]) }}">
                                <i class="fas fa-envelope"></i>
                            </a>
                        @else
                            <a href="{{ route("notification.unread", ["notification" => $notification]) }}">
                                <i class="fas fa-envelope-open-text"></i>
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __("common.There is no data yet.") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $notifications->links() }}