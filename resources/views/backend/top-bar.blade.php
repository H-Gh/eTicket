<div class="top-bar">
    <div class="icons">
        <div class="content">
            <div class="welcome">
                <ul>
                    <li>
                        <a href="{{ route("home") }}">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="user-notification-container">
                        <a href="{{ route("admin.notification.list") }}">
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
                            <i class="fas fa-user-cog"></i>
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
        </div>
    </div>
    <div class="navigation">
        <div class="navigation-content">
            <div class="page-title">
                {{ $pageTitle }}
            </div>
            <div class="page-breadcrumb">
                {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() }}
            </div>
        </div>
    </div>
</div>