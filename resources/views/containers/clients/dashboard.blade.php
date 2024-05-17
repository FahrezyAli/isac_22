@extends('components.template.client')

@section('title')
    Halo, {{ $namaTim }}!
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/dashboard.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <div class="profile-container">
        <h1 class="judul" data-tim="{{ $namaTim }}">{{ $namaTim }}</h1>
        <div class="team-profile-container">
            @foreach ($anggota as $member)
                <div class="profile-list">
                    <div style="background-image: url('{{ asset('storage/pas_foto/' . $member->pas_foto) }}')"
                        class="profile-img"></div>
                    <h3>{{ $member->nama }}</h3>
                    <h5>{{ $member->ketua ? 'Ketua Tim' : 'Anggota Tim' }}</h5>
                </div>
            @endforeach
            {{-- @if (count($anggota) == 2)
                <div class="profile-list">
                    <div class="profile-img"></div>
                    <a href="{{ route('form.addAnggota', $namaTim) }}">Tambah Anggota ke-3</a>
                </div>
            @endif --}}
        </div>
    </div>

    <div class="regis-content">
        <div class="tagline">
            <h2>AYO IKUT BERPARTISIPASI !</h2>
            <h3 class="quotes">"Semua impian kita dapat menjadi nyata jika kita memiliki keberanian untuk
                mengejarnya." - Walt Disney</h3>
        </div>

        <div class="regis-list">
            <div class="lomba lomba--olym">
                <h3>OLYMPIAD</h3>
                <p>ISAC Olympiad adalah kompetisi yang menguji kemampuan logika, pemrograman dasar, dan ilmu sistem
                    informasi dasar. Kompetisi ini bertujuan untuk mengasah kemampuan logika dan pemrograman peserta serta
                    memperkenalkan ilmu sistem informasi dasar tepatnya dalam ranah jaringan, bisnis, dan sistem. ISAC
                    Olympiad diselenggarakan secara online dengan skala nasional untuk seluruh siswa SMA atau sederajat.</p>
                <a href="{{ route('lomba.olim', $namaTim) }}"
                    class="button btn-secondary">{{ Auth::user()->lomba_olym ? 'LIHAT STATUS' : 'DAFTAR SEKARANG!' }}</a>

            </div>
            <div class="lomba lomba--ui">
                <h3>UI/UX COMPETITION</h3>
                <p>ISAC UI/UX Competition adalah kompetisi yang menguji analisa dan kreativitas peserta dalam menghadirkan
                    sebuah informasi yang memberikan kenyamanan dan kemudahan untuk pengguna dalam bentuk desain website.
                    Kompetisi ini bertujuan untuk mengasah kemampuan peserta dalam menyelesaikan sebuah masalah dan
                    memberikan informasi dalam wujud desain website. Dalam ISAC UI/UX Competition, Pada babak penyisihan
                    peserta akan membuat proposal mengenai website yang akan didesain ulang. Pada babak final, peserta akan
                    diberikan studi kasus tambahan yang nantinya akan dipresentasikan di depan juri.</p>
                <a href="{{ route('lomba.ui', $namaTim) }}"
                    class="button btn-secondary">{{ Auth::user()->lomba_ui ? 'LIHAT STATUS' : 'DAFTAR SEKARANG!' }}</a>
            </div>
        </div>
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
