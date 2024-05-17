@extends('components.template.client')

@section('title')
    Tambahkan Anggota {{ $namaTim }}
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/add-anggota.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <div class="title-section">
        <h1 class="judul" data-tim="{{ $namaTim }}">{{ $namaTim }}</h1>
        <h4>Biodata tim ke-{{ $jlhAnggota + 1 }}</h4>
    </div>
    <form action="{{ route('form.addAnggota', $namaTim) }}" method="POST" enctype="multipart/form-data"
        class="add-anggota-form">
        @csrf
        <div class="image">
            <h4>PAS FOTO</h4>
            <img src="{{ url('assets/img/pas.png') }}" alt="" class="view-pasFoto">
            <input type="file" accept="image/png, image/jpeg" class="hidden" name="pas_foto" id="pas_foto">
            @error('pas_foto')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
            <label for="pas_foto" class="button btn-primary">UNGGAH FOTO</label>
        </div>
        <div class="team-data">
            <div class="form-group">
                <label class="form-label" for="nama">NAMA LENGKAP</label>
                <input type="text" class="form-control" name="nama" id="nama"
                    value="{{ old('nama') ? old('nama') : '' }}">
                @error('nama')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="tanggal_lahir">TANGGAL LAHIR</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : '' }}">
                @error('tanggal_lahir')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
            @if ($ketua < 1)
                @if ($jlhAnggota == 2)
                    <input type="hidden" name="status" value="1">
                @else
                    <div class="form-group">
                        <p class="form-label" for="status">STATUS</p>
                        <div class="form-radio">
                            <input type="radio" class="hidden" name="status" id="ketua" value="1" checked>
                            <label for="ketua"><span></span> Ketua Tim</label>
                        </div>
                        <div class="form-radio">
                            <input type="radio" class="hidden" name="status" id="anggota" value="0"
                                @if (old('status') == '0') checked @endif>
                            <label for="anggota"><span></span> Anggota Tim</label>
                        </div>
                    </div>
                @endif
            @endif
            <div class="form-group">
                <label class="form-label" for="no_whatsapp">NO. WHATSAPP</label>
                <input type="text" class="form-control" name="no_whatsapp" id="no_whatsapp"
                    value="{{ old('no_whatsapp') ? old('no_whatsapp') : '' }}">
                @error('no_whatsapp')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="bukti_siswa">BUKTI SISWA AKTIF</label>
                <input type="file" accept="image/jpeg, image/png" class="form-control file-control" name="bukti_siswa"
                    id="bukti_siswa">
                <label for="bukti_siswa" class="file-label">
                    <span id="bukti_siswa_filename" class="file-label__label">Tidak ada file</span>
                    <div class="button btn-primary file-label__btn">Pilih File</div>
                </label>
                @error('bukti_siswa')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>

            <div class="btns">
                @if ($jlhAnggota == 2 && $adaKetua == true)
                    <a href="{{ route('dashboard', $namaTim) }}" class="h5">Skip</a>
                @else
                    <span></span>
                @endif
                <button type="submit" class="btn-secondary">SUBMIT DATA</button>
            </div>
        </div>
    </form>
@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/add-anggota.js') }}"></script>
@endsection
