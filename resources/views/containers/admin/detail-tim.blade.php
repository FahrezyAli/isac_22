@extends('components.template.admin')

@section('title')
    Tim {{ $team->namaTim }}
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'detail')
@section('content')
    <div class="detail__container">
        <h2 class="detail__title">Info Peserta</h2>
        <hr class="detail__hr">
        <div class="detail__cards">
            @foreach ($team->tim as $member)
                <div class="detail__card">
                    <div class="detail__card-head">
                        <div style="background-image: url('{{ asset('storage/pas_foto/' . $member->pas_foto) }}')"
                            class="detail__img"></div>
                        <h3>{{ $member->nama }}</h3>
                        <p>{{ $member->ketua ? 'Ketua Tim' : 'Anggota Tim' }}</p>
                    </div>
                    <h5>Tanggal lahir : {{ $member->tanggal_lahir }}</h5>
                    <h5>No. Whatsapp : {{ $member->no_wa }}</h5>
                    <h5>Bukti siswa :
                        <a href="{{ url('storage/bukti_siswa') . '/' . $member->buktiSiswa }}" target="_blank"
                            rel="noopener noreferrer" class="list__btn">Lihat bukti siswa aktif</a>
                    </h5>
                    <h5>Sertifikat :
                        @if ($member->sertifikat)
                            <a href="{{ url('storage/sertifikat') . '/' . $member->sertifikat }}" target="_blank"
                                rel="noopener noreferrer" class="list__btn">Sertifikat_{{ $member->nama }}.pdf</a>
                        @else
                            Tidak ada file
                        @endif
                    </h5>
                    @if ($member->sertifikat)
                        <button class="detail__delete-btn btn-admin"
                            data-action="{{ route('delete_sertif', $member->id) }}"
                            data-member="{{ $member->nama }}">Hapus Sertifikat</button>
                    @else
                        <form action="{{ route('upload_sertif', $member->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="file" accept="application/pdf" class="hidden submit-sertif"
                                id="sertifikat_{{ $member->id }}" name="sertifikat">
                            <label for="sertifikat_{{ $member->id }}" class="button btn-admin">Unggah Sertifikat</label>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- modal delete confirmation --}}
    <form action="" method="POST" enctype="multipart/form-data" class="detail__delete-dialog dialog">
        @method('put')
        @csrf
        <h3>Hapus Sertifikat?</h3>
        <p class="dialog__desc">Yakin ingin menghapus sertifikat <span></span>?</p>
        <div class="dialog__btns">
            <button type="submit" class="dialog__btn-cancel">Hapus</button>
            <button type="button" class="btn-primary dialog__btn-close">Batalkan</button>
        </div>
    </form>

    <div class="dialog__bg"></div>
@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/admin-tim.js') }}"></script>
@endsection
