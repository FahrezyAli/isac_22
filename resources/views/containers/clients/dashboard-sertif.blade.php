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
                    @if (! $member->sertifikat)
                    <td>Sertifikat Belum Tersedia</td><br>
                    @else
                    <form method="get" action="{{ route('download.sertif',['namaTim'=>$namaTim,'id'=>$member->id]) }}">
                        <button class="btn-primary" style="margin-top:5px">Download</button>
                    </form>
                    @endif
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
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection