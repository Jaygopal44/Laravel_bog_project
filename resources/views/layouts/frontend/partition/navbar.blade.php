<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-3">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('frontend/img/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav scrollable-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ url('/posts') }}">Posts</a></li>
                    <li><a href="{{ url('/categories') }}">Categories</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>

                    @if (Route::has('login'))
                        @auth
                            <!-- Dropdown -->
                            <li class="dropdown">
                                <a href="#" onclick="dropMenu()" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                                </a>
                                <div id="dropMenu" class="dropdown-menu menu1" style="display: none;" role="menu"
                                    aria-hidden="true">
                                    @if (Auth::user()->role && Auth::user()->role->id == 1)
                                        <a href="{{ url('/Admin/Profile') }}" class="dropdown-item" target="_blank"
                                            role="menuitem">{{ Auth::user()->name }}</a>
                                        <a class="dropdown-item" href="{{ url('Admin/Dashboard') }}" role="menuitem"><i
                                                class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                                    @elseif (Auth::user()->role && Auth::user()->role->id == 2)
                                        <a href="{{ url('users/profile') }}" class="dropdown-item" target="_blank"
                                            role="menuitem">{{ Auth::user()->name }}</a>
                                        <a class="dropdown-item" href="{{ url('user/dashboard') }}" role="menuitem"><i
                                                class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        role="menuitem">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function dropMenu() {
        var dropmenu = document.getElementById('dropMenu');
        if (dropmenu.style.display === "none") {
            dropmenu.style.display = "block";
            dropmenu.setAttribute('aria-hidden', 'false');
            dropmenu.querySelector('a').focus();
        } else {
            dropmenu.style.display = "none";
            dropmenu.setAttribute('aria-hidden', 'true');
            // Return focus to dropdown trigger
            document.querySelector('.dropdown > a').focus();
        }
    }

    // Close dropdown menu when clicking outside
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown > a')) {
            var dropdownMenu = document.getElementById('dropMenu');
            if (dropdownMenu.style.display === 'block') {
                dropdownMenu.style.display = 'none';
                dropdownMenu.setAttribute('aria-hidden', 'true');
            }
        }
    });

    // Toggle dropdown menu with Enter or Space key
    window.addEventListener('keydown', function(event) {
        var dropdownTrigger = document.querySelector('.dropdown > a');
        if (event.target === dropdownTrigger) {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                dropMenu();
            }
        }
    });
</script>
