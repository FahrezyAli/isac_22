@extends('dashboard.navbar')

@section('content')
<style>
  input[type="file"] {
    display: none;
  }
  .custom-file-upload {
    border: 1px solid rgb(0, 0, 0);
    display: inline-block;
    padding: 3px 6px;
    cursor: pointer;
}
</style>
<a href="{{ route('peserta') }}">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Nomor Whatsapp</th>
        <th scope="col">Posisi</th>
        <th scope="col">Sertifikat</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($team->tim as $member)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $member->nama }}</td>
          <td>{{ $member->tanggal_lahir }}</td>
          <td>{{ $member->no_wa }}</td>
          <td>@if ($member->ketua)
              Ketua
              @else
              Anggota
          @endif</td>
          <td>
            @if (! $member->sertifikat)
              <form action="/dashboard/peserta/{{ $member->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label class="custom-file-upload">
                  <input type="file" accept="application/pdf" id="sertifikat" name="sertifikat" onchange="this.form.submit();">
                  Upload Sertifikat
                </label>
                <br>
              </form>
            @else
              <a href="{{ url('storage/sertifikat') . '/' . $member->sertifikat }}" target="_blank" rel="noopener noreferrer">Sertifikat_{{ $member->nama }}.pdf</a>
              <form action="{{ route('delete_sertif',$member->id) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <button type="submit">Delete Sertifikat</button><br>
              </form>
            @endif
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
