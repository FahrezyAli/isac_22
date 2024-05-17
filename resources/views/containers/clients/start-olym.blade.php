@extends('components.template.client')

@section('title', 'Mulai ISAC Olympiad')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/submit-ui.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <h1 class="judul" data-judul="OLYMPIAD COMPETITION">OLYMPIAD COMPETITION</h1>

    <div class="contents">
        <div class="description">
            <div class="rules">
                <h2>RULES</h2>
                <ol>
                    <li>Kestabilan jaringan internet, perangkat elektronik, dan hal-hal yang menyangkut proses pengerjaan
                        soal menjadi tanggung jawab penuh peserta </li>
                    <li>Peserta wajib mengerjakan dengan anggota timnya sendiri dengan jujur.</li>
                    <li>Peserta yang melakukan segala bentuk kecurangan akan didiskualifikasi.</li>
                    <li>Keputusan juri dan panitia ISAC 2022 tidak dapat diganggu gugat.</li>
                    <li>Peserta yang telah selesai terlebih dahulu dalam mengerjakan soal sebelum waktu yang ditentukan
                        diperkenankan untuk mengakiri proses pengerjaan tanpa menunggu waktu maksimal yang ditentukan.</li>
                    <li>Soal pada babak ini terdiri dari 50 soal dalam bentuk pilihan ganda dengan 5 opsi.</li>
                    <li>Waktu pengerjaan selama 100 menit.</li>
                    <li>Aturan penilaian yaitu :</li>
                    <ol>
                        <li>Jawaban benar : + 4 poin</li>
                        <li>Jawaban salah : -2 poin</li>
                        <li>Tidak dijawab : 0 poin</li>
                        <li>Jika terdapat peserta yang memiliki nilai yang sama dan jumlah point maka akan dilihat dari
                            berapa lama pengerjaan soal</li>
                    </ol>
                    <li>Peserta dapat mengerjakan soal dalam rentang waktu 08:00 WIB sampai dengan 15:00 WIB.</li>
                    <li>Peserta yang terlambat mengerjakan, tetap dapat login dan mengerjakan soal tanpa memperoleh tambahan
                        waktu </li>
                </ol>
            </div>
            <a href="{{ route('attempt', ['namaTim' => $namaTim, 'no' => 1]) }}" class="button btn-secondary">MULAI
                MENGERJAKAN</a>
        </div>
        <img src="{{ url('assets/img/vr-grl.png') }}" alt="object" class="image">
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
