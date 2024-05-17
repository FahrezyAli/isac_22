{{-- Buat refresh halaman otomatis, durasi dalam bentuk detik --}}
<meta http-equiv="refresh" content="{{ ($duration > 60)? 60 : $duration }}" />

<p>soal no {{ $no }}</p>
<p>
    {{ $question->soal }}
    @if($question->gambar_soal)
    <br><img style="width:50px; height:50px;"src="{{ asset('storage/gambar_soal/' . $question->gambar_soal) }}">
    @endif
</p>
<form action="{{ route('answer',['namaTim' => $namaTim,'no'=> $no]) }}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="soal_id" value="{{ $question->id }}">
    @foreach ($options as $option)
    {{-- @if ($attempt->option_id)
    @endif --}}
    <input type="radio" id="{{ $loop->iteration }}" name="option_id" value="{{ $option->id }}"{{ $option->id == $attempt->option_id ? 'checked' : '' }}>
    {{-- <input type="radio" id="{{ $loop->iteration }}" name="option_id" value="{{ $option->id }}"> --}}

        {{ $option->isi_option }}
        @if($option->gambar_option)
        <br><img style="width:50px; height:50px;"src="{{ asset('storage/gambar_option/' . $option->gambar_option) }}">
        @endif
        <br>
    @endforeach
    <input type="checkbox" name="flag" {{ ($attempt->flag)? 'checked' : '' }}>flag<br>


    @if ($no > 1)
        {{-- <a type="submit" href="{{ route('attempt',['namaTim'=>$namaTim,'no'=>($no-1)]) }}">Previous</a> --}}
        <button type="submit" name="action" value="previous"> Previous</button>
    @endif
    <button type="submit" name="action" value="next">{{ ($no == $total_question)? 'Finish' : 'Next' }}</button>
    <br>
    @for ($i=1; $i <= $total_question; $i++)
        <button type="submit" name="action" value="{{ "moveTo-".$i }}">{{ $i }}</button>
    @endfor
</form>
