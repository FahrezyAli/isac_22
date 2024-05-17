@extends('components.template.admin')

@section('title', 'List Soal Olimpiade')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/list-soal.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pagination.css') }}">
@endsection

@section('contentclass', 'list-soal')
@section('content')
    <div class="headline">
        <h1>List Soal Olympiad</h1>
        <a href="{{ route('add-soal') }}" class="button btn-secondary">ADD</a>
    </div>

    <div class="contents">
        @foreach ($soals as $soal)
            <div class="preview-question">
                <div class="question" onclick="window.location.href = '{{ route('edit-soal', [$soal->id]) }}'">
                    <div class="soal">
                        <p>{{ $soal->soal }}</p>
                        @if ($soal->gambar_soal)
                            <img class="question-img" src="{{ asset('storage/gambar_soal/' . $soal->gambar_soal) }}">
                        @endif
                    </div>

                    <div class="jawaban">
                        <p>JAWABAN = {{ $soal->jawaban($soal->id) }}</p>
                        @if ($soal->jawaban_gambar($soal->id))
                            <img class="question-img"
                                src="{{ asset('storage/gambar_option/' . $soal->jawaban_gambar($soal->id)) }}">
                        @endif
                    </div>
                </div>
                <form action="{{ route('delete-soal', [$soal->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="question-delete">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    {{ $soals->links('components.pagination') }}
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
