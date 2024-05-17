<h1>HALO {{ $namaTim }}</h1>
<form method="get" action="{{ route('auth.logout') }}">
    <button type="submit" class="logoutbtn">Log Out</button>
</form><br>

{{-- navbar --}}
<a href="{{ route('landing')}}">landing</a>
<a href="{{ route('lomba.ui',$namaTim) }}">lomba UI/UX</a>
<a href="{{ route('lomba.olim',$namaTim) }}">lomba Olympiad</a>
<a href="{{ route('dashboard.sertif',$namaTim) }}">Sertif</a>

    {{-- ISI KALO UDH GA PERLU ANGGOTA --}}
    <h1>UDAH BISA</h1>
    @foreach($anggota as $member)
        <tr>
            <td><img src="{{ asset('storage/pas_foto/'.$member->pas_foto) }}" style="width: 325px; height: 325px;"></td>
            <td>{{ $member->nama }}-</td>
            @if ($member->ketua ==1)
            <td>Ketua</td>
            @else
            <td>Anggota</td>
            @endif
            <td>;</td>
        </tr>
    @endforeach
    <form method="get" action="{{ route('lomba.ui',$namaTim) }}">
        <h2>LOMBA UI/UX</h2>
        <button type="submit" class="daftarLombaA">Register</button>
    </form><br>

    <form method="get" action="{{ route('lomba.olim',$namaTim) }}">
        <h2>LOMBA Olympiad</h2>
        <button type="submit" class="daftarLombaB">Register</button>
    </form><br>

    @if($jlhAnggota == 2 && $adaKetua == true)
        <a href="{{ route('form.addAnggota',$namaTim) }}">Tambah Anggota 3</a>
    @endif

{{-- INI BUAT ADMIN AJA, BUAT UPLOAD SERTIF
<form method="post" action="{{ route('add.sertif',$namaTim) }}"  enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label for="add_sertif">ADD SERTIFIKAT</label>
        <input type="file" name="sertif" id="add_sertif" class="form-control" required>
    </div>
    <button type="submit" class="addSertif">Add Sertif</button>
</form><br> --}}




