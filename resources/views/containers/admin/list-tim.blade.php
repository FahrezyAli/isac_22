@extends('components.template.admin')

@section('title', 'List Tim')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'list')
@section('content')
    @php
    $tanpa_anggota = 0;
    $dua_anggota = 0;
    $tiga_anggota = 0;
    $ui = 0;
    $olym = 0;
    foreach ($teams as $team) {
        $x = count($team->tim);
        switch ($x) {
            case 0:
                $tanpa_anggota++;
                break;
            case 2:
                $dua_anggota++;
                break;
            case 3:
                $tiga_anggota++;
                break;
        }

        if ($team->lomba_ui) {
            $ui++;
        }

        if ($team->lomba_olym) {
            $olym++;
        }
    }
    @endphp

    <div class="list__title-section">
        <h1 class="list__title">Data Tim</h1>
        <select name="filter" id="filterTim" class="form-control list__dropdown">
            <option value="0">Tanpa filter ({{ count($teams) }})</option>
            <option value="1">Tanpa anggota ({{ $tanpa_anggota }})</option>
            <option value="2">Dua anggota ({{ $dua_anggota }})</option>
            <option value="3">Tiga anggota ({{ $tiga_anggota }})</option>
            <option value="4">Tim Olympiad ({{ $olym }})</option>
            <option value="5">Tim UI/UX ({{ $ui }})</option>
        </select>
    </div>
    <hr class="list__line">
    <div class="list__tabel-container">
        <table class="list__tabel list__tabel--thead">
            <colgroup>
                <col span="1" width="4%">
                <col span="1" width="20%">
                <col span="1" width="20%">
                <col span="1" width="15%">
                <col span="1" width="15%">
                <col span="1" width="15%">
                <col span="1" width="6%">
            </colgroup>
            <thead>
                <th class="list__tabel--no">No</th>
                <th class="list__tabel--nama-tim">Nama Tim</th>
                <th class="list__tabel--ketua">Ketua</th>
                <th class="list__tabel--email">email</th>
                <th class="list__tabel--sekolah">Asal Sekolah</th>
                <th class="list__tabel--sertif">Sertifikat</th>
                <th class="list__tabel--aksi">Aksi</th>
            </thead>
        </table>
        <div class="list__tabel-overflow">
            <table id="tabelTim" class="list__tabel">
                <colgroup>
                    <col span="1" width="4%">
                    <col span="1" width="20%">
                    <col span="1" width="20%">
                    <col span="1" width="15%">
                    <col span="1" width="15%">
                    <col span="1" width="15%">
                    <col span="1" width="6%">
                </colgroup>
                <tbody>
                    @foreach ($teams as $team)
                        <tr data-anggota='{{ count($team->tim) }}' data-lomba_ui='{{ $team->lomba_ui ? 1 : 0 }}'
                            data-lomba_olym='{{ $team->lomba_olym ? 1 : 0 }}'>
                            <td class="list__tabel--no">{{ $loop->iteration }}</td>
                            <td class="list__tabel--nama-tim">{{ $team->namaTim }}</td>
                            <td class="list__tabel--ketua">
                                @foreach ($team->tim as $member)
                                    @if ($member->ketua)
                                        {{ $member->nama }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="list__tabel--email">{{ $team->emailTim }}</td>
                            <td class="list__tabel--sekolah">{{ $team->asalSekolah }}</td>
                            <td class="list__tabel--sertif">
                                @php
                                    $jlh_anggota = 0;
                                    $anggota_sertif = 0;
                                    foreach ($team->tim as $member) {
                                        $jlh_anggota += 1;
                                        if ($member->sertifikat != null) {
                                            $anggota_sertif += 1;
                                        }
                                    }
                                @endphp
                                {{ $anggota_sertif }}/{{ $jlh_anggota }}
                            </td>
                            <td class="list__tabel--aksi"><a href="{{ route('detail_peserta', $team->id) }}"
                                    class="list__btn">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/filter-tim.js') }}"></script>
@endsection
