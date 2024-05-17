<nav class="navbar">
    <div class="nav-content">
        <img src="{{ url('assets/img/logo.png') }}" alt="logo.png" class="logo"
            onclick="location.href='{{ Auth::user() ? route('dashboard', Auth::user()->namaTim) : route('landing') }}'">

        <div class="nav-menu">
            @if (Auth::user())
                <div class="h4">
                    Halo {{ Auth::user()->namaTim }}
                </div>
                <div class="nav-list">
                    <a
                        href="{{ count(Auth::user()->tim) >= 2 ? route('lomba.olim', Auth::user()->namaTim) : route('form.addAnggota', Auth::user()->namaTim) }}">olympiad</a>
                </div>
                <div class="nav-list">
                    <a
                        href="{{ count(Auth::user()->tim) >= 2 ? route('lomba.ui', Auth::user()->namaTim) : route('form.addAnggota', Auth::user()->namaTim) }}">ui/ux</a>
                </div>
                <div class="nav-list">
                    <a href="{{ route('sertif', Auth::user()->namaTim) }}">sertifikat</a>
                </div>
                <div class="login">
                    <a href="{{ route('auth.logout') }}">logout</a>
                </div>
            @else
                <div class="h4">
                    Selamat Datang!
                </div>
                <div class="nav-list">
                    <a href="#about">about</a>
                </div>
                <div class="nav-list">
                    <a href="#timeline">timeline</a>
                </div>
                <div class="login">
                    <a href="{{ route('auth.login') }}">login</a>
                </div>
            @endif
        </div>
    </div>

    @if (Auth::user())
        <a href="{{ route('auth.logout') }}" class="button btn-primary">logout</a>
    @else
        <a href="{{ route('auth.login') }}" class="button btn-primary">login</a>
    @endif

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
