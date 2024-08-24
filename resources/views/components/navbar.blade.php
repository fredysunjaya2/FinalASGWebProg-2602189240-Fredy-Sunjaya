<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-4" href="#">
            <img src="{{ asset('/assets/logo.png') }}" alt="Logo" width="40" height="40"
                class="d-inline-block align-text-top">
            ConnectionFriends
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('activeHome')" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeWishlist')" href="#">Wishlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeFriends')" href="#">Friends</a>
                </li>
            </ul>
            <ul class="ms-auto me-3">
                @if (Auth::check())
                <li class="nav-item d-flex align-items-center justify-center">
                    <p class="text-danger pt-3 me-5 fs-5">Coin: {{ Auth::user()->coin }}</p>
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/login') }}" class="btn btn-secondary me-4">Login</a>
                    <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>