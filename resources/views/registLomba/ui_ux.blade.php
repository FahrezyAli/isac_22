<h1>Lomba UI UX</h1>
@if($daftar==false)
<form method="post" action="{{ route('registA',['namaTim'=>$namaTim]) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label for="bukti_bayar">Bukti Bayar</label>
        <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
    </div>
    <button type="submit" class="submitBukti">Submit</button>
</form>
@else
    @if($verified == false)
    <h2>UDAH DAFTAR, TUNGGU VERIF</h2>
    @else
    <h2>UDAH DIVERIF, TUNGGU WAKTU MAIN</h2>
    @endif
    <a href="{{ route('dashboard',$namaTim) }}">BACK</a>

@endif
{{-- janlup kasih notif klo udh keinput isinya --}}