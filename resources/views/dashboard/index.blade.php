@extends('dashboard.navbar')

@section('content')
    <h1>Welcome to Dashboard</h1>

    <div>
        <a href="{{ route('peserta') }}"><h2>Jumlah Tim : {{ $jlh_tim }}</h2></a><br>
    </div>

    <div>
        <a href="{{ route('autentikasi.admin') }}"><h2>Jumlah Tim Olimpiade : {{ $olim }} ({{ $olim_verif }} terverifikasi)</h2></a><br>
    </div>

    <div>
        <a href="{{ route('autentikasi.admin') }}"><h2>Jumlah Tim Ui/Ux : {{ $ui }} ({{ $ui_verif }} terverifikasi)</h2></a><br>
    </div>

    <div>
        <h3>Jumlah Peserta : {{ $jlh_peserta }}</h3>
    </div>
    {{-- NAMBAH JUMLAH TIM BRP --}}
    {{-- JUMLAH OLIM --}}
    {{-- JUMLAH UI/UX --}}
    {{-- + MORE INFO --}}
@endsection
