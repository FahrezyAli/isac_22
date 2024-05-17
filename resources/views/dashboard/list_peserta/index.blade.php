@extends('dashboard.navbar')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama TIM</th>
        <th scope="col">Ketua Tim</th>
        <th scope="col">Email</th>
        <th scope="col">Asal Sekolah</th>
        <th scope="col">Action</th>
        <th scope="col">Sertifikat</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            @if (! $team->admin)
              <tr>
                <th scope="row">{{ $loop->iteration-1 }}</th>
                <td>{{ $team->namaTim }}</td>
                @foreach ($team->tim as $member)
                    @if ($member->ketua)
                        <td>{{ $member->nama }}</td>
                    @endif
                @endforeach
                <td>{{ $team->emailTim }}</td>
                <td>{{ $team->asalSekolah }}</td>
                <td><button><a href="/dashboard/peserta/{{ $team->id }}">Detail</a></button></td>
                <td>
                  <?php 
                    $jlh_anggota=0;
                    $anggota_sertif=0;
                    foreach ($team->tim as $member){
                      $jlh_anggota+=1;
                      if ($member->sertifikat != NULL){
                        $anggota_sertif+=1;
                      }
                    } 
                  ?>
                  {{  $anggota_sertif }}/{{ $jlh_anggota }} Sudah memiliki sertifikat
                </td>
              </tr>
            @endif
        @endforeach
    </tbody>
  </table>
@endsection
