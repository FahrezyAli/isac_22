@extends('components.template.client')

@section('title', 'Mulai ISAC Olympiad')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/end-attempt.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <h1 class="judul" data-judul="OLYMPIAD COMPETITION">OLYMPIAD COMPETITION</h1>

    <div class="description">
        <div class="thank-you">
            <h2>TERIMA KASIH ATAS PARTISIPASINYA</h2>
            <h4>jangan lupa untuk memeriksa hasilnya pada tanggal 19 September 2022</h4>
        </div>
        <img src="{{ url('assets/img/vr-grl.png') }}" alt="object" class="image">
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
