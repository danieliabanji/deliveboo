{{-- NAV DESKTOP VERSION  --}}

<nav class="navbar position-relative navbar-expand-lg shadow-sm p-0" id="nav-desktop">

    <div class="container">

        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            {{-- Sezione sinistra --}}
            <ul class="navbar-nav mb-2 mb-lg-0 col-4 d-flex align-items-center">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                            class=" {{ request()->routeIs('login') ? 'myactive' : '' }} nav-link">Accedi</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                                class=" {{ request()->routeIs('register') ? 'myactive' : '' }} nav-link">Registrati</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-left collapse" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

            {{-- Logo --}}
            <div class="logo col-4 d-flex align-items-center justify-content-center">
                <a class="nav-link" href="http://localhost:5174/"><img
                        src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png"
                        alt="Deliveboo"></a>
            </div>

            {{-- Sezione destra --}}
            <div class=" col-4 d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="http://localhost:5174/contacts"
                            class=" {{ request()->routeIs('login') ? 'myactive' : '' }} nav-link">Contattaci</a>
                    </li>
                    {{-- <li class="nav-item">
                                <a href="{{ route('register') }}" class=" {{ request()->routeIs('register') ? 'myactive':'' }} nav-link">Entra nel nostro Team</a>
                            </li> --}}
                    {{-- <li>
                                <form class="d-flex ml-3" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn mybtn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                            </li> --}}
                </ul>
            </div>
        </div>


    </div>

</nav>



{{-- NAV MOBILE VERSION --}}
<nav class="navbar fixed-top d-lg-none p-0" id="nav-mobile">
    <div class="container-fluid d-lg-none">
        <a class="navbar-brand" href="http://localhost:5174/"><img
                src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png"alt="Deliveboo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <i class="fa-solid fa-bars fa-l"></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="nav-link" href="http://localhost:5174/"><img
                        src="https://cdn.discordapp.com/attachments/1043196087617470534/1072087578813153320/logo-deliveboo-removebg-preview.png"
                        alt="Deliveboo"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                        class=" {{ request()->routeIs('login') ? 'myactive' : '' }} nav-link">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                        class=" {{ request()->routeIs('register') ? 'myactive' : '' }} nav-link">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost:5174/contacts"
                            class=" {{ request()->routeIs('login') ? 'myactive' : '' }} nav-link">Contattaci</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
