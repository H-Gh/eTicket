<div class="notification-container">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('alert'))
        <div class="alert alert-success" role="alert">
            {{ session('alert') }}
        </div>
    @endif
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info') }}
        </div>
    @endif
</div>