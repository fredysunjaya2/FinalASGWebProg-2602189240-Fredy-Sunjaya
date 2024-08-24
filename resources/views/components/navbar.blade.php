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
                    <a class="nav-link @yield('activeHome')" aria-current="page" href="{{ route('dashboard') }}">{{
                        __('navbar.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeWishlist')" href="{{ route('wishlist') }}">{{ __('navbar.wishlist')
                        }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeFriend')" href="{{ route('friend') }}">{{ __('navbar.friends')
                        }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeNotification')" href="{{ route('notification') }}">{{
                        __('navbar.notifications') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeTopup')" href="{{ route('topup') }}">{{
                        __('navbar.topup') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSettings')" href="{{ route('settings') }}">{{
                        __('navbar.settings') }}</a>
                </li>
            </ul>
            <ul class="d-flex flex-row ms-auto me-3">
                <li class="nav-item d-flex align-items-center justify-center me-5">
                    <a href="{{ route('change-locale', 'en') }}" class="text-info pt-3 fs-5">EN</a>
                    <p class="text-info pt-3 fs-5 px-2">|</p>
                    <a href="{{ route('change-locale', 'id') }}" class="text-info pt-3 fs-5">ID</a>
                </li>
                @if (Auth::check())
                <li class="nav-item d-flex align-items-center justify-center">
                    <p class="text-danger pt-3 me-5 fs-5">Coin: {{ Auth::user()->coin }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('navbar.logout') }}</button>
                    </form>
                </li>
                @else
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('login') }}" class="btn btn-secondary me-4">{{ __('navbar.login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">{{ __('navbar.register') }}</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
