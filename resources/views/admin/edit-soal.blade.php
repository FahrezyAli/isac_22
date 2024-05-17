<form action="{{ route('update-soal', [$soal->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <label for="soal"><b>Soal</b></label><br>
    @error('soal')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="soal" id="soal" value="{{ $soal->soal }}"><br>
    @if ($soal->gambar_soal)
        <img style="width:50px; height:50px;"src="{{ asset('storage/gambar_soal/' . $soal->gambar_soal) }}">
    @endif

    <label for="gambarSoal"><b>Gambar Soal</b></label><br>
    @error('gambarSoal')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_soal" id="gambarSoal"><br><br>


    @foreach ($options as $option)
        @php
            $name_gambar='gambar_';
            $id_gambar='gambar';
            $name_gambar = $name_gambar . $loop->iteration;
            $id_gambar = $id_gambar . $loop->iteration;
            
            $name_option='option_';
            $id_option='option';
            $name_option = $name_option . $loop->iteration;
            $id_option = $id_option . $loop->iteration;
        @endphp

        <label for="{{ $id_option }}"><b>Option {{ $loop->iteration }}*</b></label><br>
        @error('{{ $id_option }}')
            <h6 class="form-helper red-important">{{ $message }}</h6>
        @enderror
        <input type="text" name="{{ $name_option }}" id="{{ $id_option }}"
            value="{{ $option->isi_option }}"><br>

        <label for="{{ $id_gambar }}"><b>gambar {{ $loop->iteration }}</b></label><br>
        @error('{{ $id_gambar }}')
            <h6 class="form-helper red-important">{{ $message }}</h6>
        @enderror
        @if ($option->gambar_option)
            <img style="width:50px; height:50px;"src="{{ asset('storage/gambar_option/' . $option->gambar_option) }}">
        @endif
        <input type="file" accept="image/png,image/jpg" name="{{ $name_gambar }}"
            id="{{ $id_gambar }}"><br><br>

    @endforeach

    <label for="jawab_benar">Jawaban Benar:</label>
    @error('jawab_benar')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <select name="benar" id="jawab_benar">

        @foreach ($options as $option)
            <option {{ $loop->iteration == $soal->jawaban ? 'selected' : '' }} value="{{ $loop->iteration }}">Option
                {{ $loop->iteration }}</option>
        @endforeach
        {{-- <option value="" selected disabled hidden>Pilih Option</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option> --}}
    </select><br>
    <button type="submit" class="registerbtn">Submit</button>
</form>
