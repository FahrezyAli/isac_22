@extends('dashboard.navbar')

@section('content')
<table class="table">
  {{-- NAMBAH TOMBOL FILTER --}}
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tim</th>
        <th scope="col">Lomba Olympiad</th>
        <th scope="col">Lomba UI/UX</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
          @if(! $team->admin)
            <tr>
                <th scope="row">{{ $loop->iteration-1 }}</th>
                <td>{{ $team->namaTim }}</td>
                <td>
                @if (! $team->lomba_olym )
                No File
                @elseif($team->lomba_olym->verified == true)
                <a class="thumb" href="{{ asset('storage/bukti_olim/'.$team->lomba_olym->bukti_bayar) }}" onclick='window.open(this.href,"_blank","width=500,height=500"); return false;'>Sudah Verifikasi</a>
                @elseif($team->lomba_olym->verified == false)
                <img style="width:50px; height:50px;"src="{{ asset('storage/bukti_olim/'.$team->lomba_olym->bukti_bayar) }}">
                <form action="{{ route('lomba_olim.verify', $team->lomba_olym->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div>
                        <button type="button">Cancel</button>
                        <button type="submit">Verify</button>
                    </div>
                </form>
                @endif
                </td>
                <td>
                    @if (! $team->lomba_ui )
                    No File
                    @elseif($team->lomba_ui->verified == true)
                    <a class="thumb" href="{{ asset('storage/bukti_ui/'.$team->lomba_ui->bukti_bayar) }}" onclick='window.open(this.href,"_blank","width=500,height=500"); return false;'>Sudah Verifikasi</a>
                    @elseif($team->lomba_ui->verified == false)
                    <img style="width:50px; height:50px;"src="{{ asset('storage/bukti_ui/'.$team->lomba_ui->bukti_bayar) }}">
                    <form action="{{ route('lomba_ui.verify', $team->lomba_ui->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div>
                            <button type="button">Cancel</button>
                            <button type="submit">Verify</button>
                        </div>
                    </form>
                    @endif
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
  </table>
@endsection
