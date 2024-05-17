@extends('components.template.client')

@section('title', 'UI/UX Competition')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/regis-lomba.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'regis-lomba')
@section('content')
    <img src="/assets/img/astronot.png" class="astronot">
    <div class="regis-lomba__content">
        @if ($daftar == false)
            <div class="regis-lomba__title-section">
                <h1 class="regis-lomba__title">
                    REGISTER <br>
                    YOUR TEAM <br>
                    <span>
                        TO PARTICIPATE <br>
                    </span>
                    <span>
                        UI/UX COMPETITION
                    </span>
                </h1>
                <p class="regis-lomba__subtitle">
                    Untuk mengikuti ISAC UI/UX Competition, tim dapat melakukan pembayaran sejumlah Rp80.000,-
                    melalui salah satu dari dua opsi pembayaran di bawah. <br><br>
                    Bank Mandiri <br>
                    1710011039586 a.n. ARUM TIYAS HANDAYANI <br>
                    Bank BNI <br>
                    1150594775 a.n. IIN MARDIYANA
                </p>
            </div>
            <form method="post" action="{{ route('registA', ['namaTim' => $namaTim]) }}" enctype="multipart/form-data"
                class="regis-lomba__form">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="bukti_bayar">Bukti Bayar (JPG atau PNG)</label>
                    <input type="file" accept="image/jpeg, image/png" class="form-control file-control"
                        name="bukti_bayar" id="bukti_bayar">
                    <label for="bukti_bayar" class="file-label">
                        <span id="bukti_bayar_filename" class="file-label__label"></span>
                        <div class="button btn-primary file-label__btn">Pilih File</div>
                    </label>
                    @error('bukti_bayar')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                </div>
                <button type="submit" class="btn-secondary">SUBMIT</button>
            </form>
        @elseif($verified === null)
            <h1>Pembayaran sedang dikonfirmasi</h1>
            <h4 class="regis-lomba__confirm-subtitle">Silakan buka website ini secara berkala untuk memeriksa status
                konfirmasi.</h4>
        @elseif($verified == true)
            <h1>Pembayaran sudah dikonfirmasi</h1>
            <h4 class="regis-lomba__confirm-subtitle">Tunggu waktu pelaksanaan lomba, ya!</h4>
            <h4 class="regis-lomba__confirm-subtitle">Jangan lupa join grup Telegram <a href="https://t.me/+F9NRaNXOxhcwMzQ"
                    target="_blank" rel="noopener noreferrer">disini</a> untuk informasi lebih lanjut</h4>
        @elseif($verified == false)
            <div class="regis-lomba__title-section">
                <h1>Pembayaran gagal dikonfirmasi</h1>
                <p class="regis-lomba__subtitle">
                    Kirim ulang bukti pembayaran yang benar untuk dikonfirmasi. Tim dapat melakukan pembayaran sejumlah
                    Rp75.000,- melalui salah satu dari dua opsi pembayaran di bawah.
                    <br><br>
                    Bank Mandiri <br>
                    1710011039586 a.n. ARUM TIYAS HANDAYANI <br>
                    Bank BNI <br>
                    1150594775 a.n. IIN MARDIYANA
                </p>
            </div>
            <form method="post" action="{{ route('registA', ['namaTim' => $namaTim]) }}" enctype="multipart/form-data"
                class="regis-lomba__form">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="bukti_bayar">Bukti Bayar (JPG atau PNG)</label>
                    <input type="file" accept="image/jpeg, image/png" class="form-control file-control"
                        name="bukti_bayar" id="bukti_bayar">
                    <label for="bukti_bayar" class="file-label">
                        <span id="bukti_bayar_filename" class="file-label__label"></span>
                        <div class="button btn-primary file-label__btn">Pilih File</div>
                    </label>
                    @error('bukti_bayar')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                </div>
                <button type="submit" class="btn-secondary">SUBMIT</button>
            </form>
        @endif

    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
