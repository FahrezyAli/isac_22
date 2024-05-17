@extends('components.template.client')

@section('title', 'Pengumpulan Link Drive')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/submit-ui.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <h1 class="judul" data-judul="UI/UX COMPETITION">UI/UX COMPETITION</h1>

    <div class="contents">
        <div class="description">
            <div class="rules">
                <h2>RULES</h2>
                <ol>
                    <li>Peserta diperbolehkan menggunakan software editing/aplikasi/web desain apapun</li>
                    <li>Karya orisinal dan belum pernah diikutsertakan ke dalam perlombaan lain</li>
                    <li>Tidak ada toleransi terkait keterlambatan pengumpulan karya</li>
                    <li>Karya yang dibuat tidak menghilangkan ciri khas dari e-commerce yang akan didesain ulang</li>
                    <li>Peserta hanya melakukan redesain website e-commerce</li>
                    <li>Peserta hanya perlu melakukan redesain terhadap halaman utama</li>
                    <li>Pesera mengumpulkan Laporan dan Video Presentasi melalui website isac.himsiunair.com</li>
                    <li>Template laporan dapat diakses <a
                            href="https://docs.google.com/document/d/1FQaKg1F9bX1c3CJ8pujGzUnlhERHNwLF/edit#" target="_blank"
                            rel="noopener noreferrer">disini</a>.</li>
                </ol>
            </div>

            @if (Auth::user()->lomba_ui->submission)
                <a href="{{ Auth::user()->lomba_ui->submission }}" target="_blank" rel="noopener noreferrer">
                    Link yang telah dikumpulkan (tekan untuk membuka)
                </a>
            @endif

            <form action="{{ route('submitA', [$namaTim]) }}" method="POST">
                @csrf
                @method('put')
                <label class="form-label" for="submission">Link Drive</label>
                <input type="text" class="form-control" name="submission" id="submission">
                @error('submission')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <button class="btn-secondary" type="submit">SUBMIT</button>
            </form>

        </div>
        <img src="{{ url('assets/img/vr-grl.png') }}" alt="object" class="image">
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
