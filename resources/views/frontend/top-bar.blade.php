<nav class="top-bar">
    <div class="navigation">
        <div class="content">
            <a href="{{ route("home") }}">
                <div class="logo-image"></div>
            </a>
            @auth
                <div class="welcome">
                    <ul>
                        <li class="user-notification-container">
                            <a href="{{ route("notification.list") }}">
                                <i class="fas fa-bell"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span class="notification-counter-container">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("profile.edit", ["user" => Auth::user()->getAuthIdentifier()] ) }}">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
