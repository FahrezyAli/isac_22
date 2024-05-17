@extends('dashboard.navbar')

@section('content')
<table class="table">
  {{-- NAMBAH TOMBOL FILTER --}}
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tim</th>
        <th scope="col">Bukti Bayar</th>
        <th scope="col">Verified</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $team->tim->namaTim }}</td>
                <td><a class="thumb" href="{{ asset('storage/bukti_ui/'.$team->bukti_bayar) }}" onclick='window.open(this.href,"_blank","width=500,height=500"); return false;'>LIAT</a></td>
                {{-- <td><img src="{{ asset('storage/bukti_ui/'.$team->bukti_bayar) }}" style="width: 325px; height: 325px;"></td> --}}
                <td>
                  @if($team->verified == false)
                  <form method="post" action="{{ route('lomba_ui.verify', $team->id) }}">
                    @method('put')
                    @csrf
                    <button type="submit" class="registerbtn">Verify</button>
                  </form>
                  @else
                  <p>Verified</p>
                  @endif
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
