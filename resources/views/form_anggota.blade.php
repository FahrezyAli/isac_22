<form method="post" action="{{ route('form.addAnggota',$namaTim) }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h1>Daftarkan Anggota ke-{{ $jlhAnggota+1 }}</h1>
        <hr>
            <label for="nama"><b>Nama</b></label>
            <input type="text" placeholder="Enter Your Name" name="nama" id="nama" required>

            <label for="date"><b>Tanggal Lahir</b></label>
            <input type="date" name="tanggal_lahir" id="date" class="form-control" style="display: inline;" required>
        
            <label for="no_wa"><b>Nomor WhatsApp</b></label>
            <input type="text" placeholder="Enter WhatsApp" name="no_wa" id="no_wa" required>
            @if($ketua<1)
        
            @if($jlhAnggota == 2)
            <input type="hidden" name="status" value="1">
            @else
            <br><span class="box-label">
                Status
            </span><br>
            <input type="radio" id="ketua" name="status" value="1">
            <label for="ketua">Ketua</label><br>
            <input type="radio" id="anggota" name="status" value="0">
            <label for="anggota">Anggota</label><br>
            @endif
            @else @endif
            <div class="col-md-6">
                <label for="bukti_siswa">Bukti Siswa</label>
                <input type="file" name="bukti_siswa" id="bukti_siswa" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="pas_foto">Pas Foto</label>
                <input type="file" accept="image/png,image/jpg" name="pas_foto" id="pas_foto" class="form-control" required>
            </div>
                        
        <hr>
        <button type="submit" class="registerbtn">Register Anggota</button>
    </div>
</form>
@if($jlhAnggota == 2 && $adaKetua == true)
    <a href="{{ route('dashboard',$namaTim) }}">Skip Anggota 3</a>
@endif