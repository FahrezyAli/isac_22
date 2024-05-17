@extends('components.template.admin')

@section('title', 'List Verifikasi Lomba Tim')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'list')
@section('content')
    @php
    $ui = 0;
    $olym = 0;
    $unverif_ui = 0;
    $unverif_olym = 0;
    foreach ($teams as $team) {
        if ($team->lomba_olym) {
            $olym++;
            if (!$team->lomba_olym->verified) {
                $unverif_olym++;
            }
        }
        if ($team->lomba_ui) {
            $ui++;
            if (!$team->lomba_ui->verified) {
                $unverif_ui++;
            }
        }
    }
    @endphp

    <div class="list__title-section">
        <h1 class="list__title">Verifikasi Lomba</h1>
        <select name="filter" id="filterVerif" class="form-control list__dropdown">
            <option value="0">Tanpa filter ({{ count($teams) }})</option>
            <option value="1">Belum diverifikasi - Olympiad ({{ $unverif_olym }})</option>
            <option value="2">Belum diverifikasi - UI/UX ({{ $unverif_ui }})</option>
            <option value="3">Semua - Olympiad ({{ $olym }})</option>
            <option value="4">Semua - UI/UX ({{ $ui }})</option>
        </select>
    </div>
    <hr class="list__line">
    <div class="list__tabel-container">
        <table class="list__tabel list__tabel--thead">
            <colgroup>
                <col span="1" width="5%">
                <col span="1" width="35%">
                <col span="1" width="15%">
                <col span="1" width="15%">
                <col span="1" width="15%">
                <col span="1" width="15%">
            </colgroup>
            <thead>
                <th class="list__tabel--no">No</th>
                <th class="list__tabel--tim">Nama Tim</th>
                <th class="list__tabel--olym">Olympiad</th>
                <th class="list__tabel--olym-skor">Skor Olympiad</th>
                <th class="list__tabel--ui">UI/UX</th>
                <th class="list__tabel--ui-submit">Pengumpulan UI/UX</th>
            </thead>
        </table>
        <div class="list__tabel-overflow">
            <table id="tabelVerif" class="list__tabel">
                <colgroup>
                    <col span="1" width="5%">
                    <col span="1" width="35%">
                    <col span="1" width="15%">
                    <col span="1" width="15%">
                    <col span="1" width="15%">
                    <col span="1" width="15%">
                </colgroup>
                <tbody>
                    @foreach ($teams as $team)
                        <tr data-lomba_olym='{{ $team->lomba_olym ? 1 : 0 }}' data-lomba_ui='{{ $team->lomba_ui ? 1 : 0 }}'
                            data-unverif_olym='@if ($team->lomba_olym) {{ $team->lomba_olym->verified ? 1 : 0 }} @endif'
                            data-unverif_ui='@if ($team->lomba_ui) {{ $team->lomba_ui->verified ? 1 : 0 }} @endif'>
                            <td class="list__tabel--no">{{ $loop->iteration }}</td>
                            <td class="list__tabel--tim">
                                <a href="{{ route('detail_peserta', $team->id) }}"
                                    class="list__btn">{{ $team->namaTim }}</a>
                            </td>
                            <td class="list__tabel--olym">
                                @if (!$team->lomba_olym)
                                    Tidak ada file
                                @elseif($team->lomba_olym->verified === null)
                                    <span class="list__btn list__btn--belum-verif" data-tim="{{ $team->namaTim }}"
                                        data-action="{{ route('lomba_olim.verify', $team->lomba_olym->id) }}"
                                        data-link="{{ url('storage/bukti_olim/' . $team->lomba_olym->bukti_bayar) }}">Belum
                                        diverifikasi</span>
                                @elseif($team->lomba_olym->verified == true)
                                    <span class="list__btn list__btn--sudah-verif"
                                        data-link="{{ url('storage/bukti_olim/' . $team->lomba_olym->bukti_bayar) }}">Sudah
                                        diverifikasi</span>
                                @elseif($team->lomba_olym->verified == false)
                                    <span class="list__btn list__btn--sudah-verif"
                                        data-link="{{ url('storage/bukti_olim/unverified_' . $team->namaTim . '.png') }}">Data
                                        tidak valid</span>
                                @else
                                    Error
                                @endif
                            </td>
                            <td class="list__tabel--olym-skor">
                                @if ($team->lomba_olym)
                                    @if ($team->lomba_olym->poin !== null)
                                        {{ $team->lomba_olym->poin }}
                                    @else
                                        Belum ada poin
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                            <td class="list__tabel--ui">
                                @if (!$team->lomba_ui)
                                    Tidak ada file
                                @elseif($team->lomba_ui->verified === null)
                                    <span class="list__btn list__btn--belum-verif" data-tim="{{ $team->namaTim }}"
                                        data-action="{{ route('lomba_ui.verify', $team->lomba_ui->id) }}"
                                        data-link="{{ url('storage/bukti_ui/' . $team->lomba_ui->bukti_bayar) }}">Belum
                                        diverifikasi</span>
                                @elseif($team->lomba_ui->verified == true)
                                    <span class="list__btn list__btn--sudah-verif"
                                        data-link="{{ url('storage/bukti_ui/' . $team->lomba_ui->bukti_bayar) }}">Sudah
                                        diverifikasi</span>
                                @elseif($team->lomba_ui->verified == false)
                                    <span class="list__btn list__btn--sudah-verif"
                                        data-link="{{ url('storage/bukti_ui/' . $team->lomba_ui->bukti_bayar) }}">Data
                                        tidak valid</span>
                                @else
                                    Error
                                @endif
                            </td>
                            <td class="list__tabel--ui-submit">
                                @if ($team->lomba_ui)
                                    @if ($team->lomba_ui->submission !== null)
                                        <a href="{{ $team->lomba_ui->submission }}" class="list__btn">Link</a>
                                    @else
                                        Belum mengirimkan
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal open image 'belum diverifikasi' --}}
    <form action="" method="POST" class="list__verif-dialog dialog">
        @csrf
        @method('put')
        <p class="dialog__desc">Yakin ingin memverifikasi pembayaran tim <span></span>?</p>
        <img src="" alt="" class="list__dialog-img">
        <div class="dialog__btns">
            <input type="radio" name="verify" id="unverified" value="0" class="hidden">
            <label for="unverified" class="button dialog__btn-cancel">Tidak Valid</label>
            <input type="radio" name="verify" id="verified" value="1" class="hidden">
            <label for="verified" class="button btn-primary">Verifikasi</label>
        </div>
    </form>

    {{-- modal open image 'sudah diverifikasi' --}}
    <div class="list__open-img-dialog dialog">
        <img src="" alt="" class="list__open-img">
    </div>

    <div class="dialog__bg"></div>
@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/admin-verif.js') }}"></script>
    <script src="{{ url('/assets/js/filter-verif.js') }}"></script>
@endsection
