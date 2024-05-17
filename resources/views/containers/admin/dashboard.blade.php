@extends('components.template.admin')

@section('title', 'Halo, Admin!')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'dashboard')
@section('content')
    <div class="dashboard__card dashboard__card--linked" onclick="location.href = '{{ route('peserta') }}'">
        <h4>Tim terdaftar</h4>
        <hr>
        <h3>{{ $jlh_tim }}</h3>
    </div>
    <div class="dashboard__card">
        <h4>Jumlah Peserta</h4>
        <hr>
        <h3>{{ $jlh_peserta }}</h3>
    </div>
    <div class="dashboard__card dashboard__card--linked" onclick="location.href = '{{ route('autentikasi.admin') }}'">
        <h4>Tim terdaftar Olympiad</h4>
        <hr>
        <h3>{{ $olim }} ( {{ $olim_verif }} Terverifikasi)</h3>
    </div>
    <div class="dashboard__card dashboard__card--linked" onclick="location.href = '{{ route('autentikasi.admin') }}'">
        <h4>Tim terdaftar UI/UX Competition</h4>
        <hr>
        <h3>{{ $ui }} ( {{ $ui_verif }} Terverifikasi)</h3>
    </div>

    {{-- <a href="{{ route('soal_olim') }}  ">Soal Olimpiade</a> --}}
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
