<h1>SOAL</h1>
{{ $soal->soal }}<br>
@if ($soal->gambar_soal)
<img style="width:50px; height:50px;"src="{{ asset('storage/gambar_soal/'.$soal->gambar_soal) }}">    
@endif
<a href="{{ route('edit-soal',[$soal->id]) }}">Edit Soal</a>
<br><h1>Options : </h1>
<ol>
    @foreach ($options as $option )
    <li>{{ $option->isi_option }}</li>
    @if ($option->gambar_option)
    <img style="width:50px; height:50px;"src="{{ asset('storage/gambar_option/'.$option->gambar_option) }}">
    @endif
    @endforeach
</ol>
