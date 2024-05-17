<nav class="navbar">
    <div class="nav-content">
        <img src="{{ url('assets/img/logo.png') }}" alt="logo.png" class="logo"
            onclick="location.href='{{ route('dashboard.admin') }}'">

        <div class="nav-menu">
            @if (Auth::user())
                <div class="h4">
                    Halo {{ Auth::user()->namaTim }}
                </div>
                <div class="nav-list">
                    <a href="{{ route('autentikasi.admin') }}">Verifikasi</a>
                </div>
                <div class="nav-list">
                    <a href="{{ route('peserta') }}">Tim</a>
                </div>
                <div class="nav-list">
                    <a href="{{ route('soal_olim') }}">Soal Olimpiade</a>
                </div>
                <div class="login">
                    <a href="{{ route('auth.logout') }}">logout</a>
                </div>
            @else
                <div class="login">
                    <a href="{{ route('auth.admin') }}">login</a>
                </div>
            @endif
        </div>
    </div>

    @if (Auth::user())
        <a href="{{ route('auth.logout') }}" class="button btn-primary">logout</a>
    @else
        <a href="{{ route('auth.admin') }}" class="button btn-primary">login</a>
    @endif

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
