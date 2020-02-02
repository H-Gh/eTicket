<nav class="top-bar">
    <div class="navigation">
        <div class="content">
            <div class="logo-image"></div>
            <div class="welcome">
                <ul>
                    <li>
                        <i class="fas fa-bell"></i>
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
</nav>
