<form action="{{ route('create-soal') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="soal"><b>Soal</b></label><br>
    @error('soal')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="soal" id="soal"><br>
    <label for="gambarSoal"><b>Gambar Soal</b></label><br>
    @error('gambarSoal')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_soal" id="gambarSoal"><br><br>

    <label for="option1"><b>Option 1*</b></label><br>
    @error('option1')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="option_1" id="option1"><br>
    <label for="gambar1"><b>gambar 1</b></label><br>
    @error('gambar1')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_1" id="gambar1"><br><br>

    <label for="option2"><b>Option 2*</b></label><br>
    @error('option2')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="option_2" id="option2"><br>
    <label for="gambar2"><b>gambar 2</b></label><br>
    @error('gambar2')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_2" id="gambar2"><br><br>

    <label for="option3"><b>Option 3*</b></label><br>
    @error('option3')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="option_3" id="option3"><br>
    <label for="gambar3"><b>gambar 3</b></label><br>
    @error('gambar3')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_3" id="gambar3"><br><br>

    <label for="option4"><b>Option 4*</b></label><br>
    @error('option4')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="option_4" id="option4"><br>
    <label for="gambar4"><b>gambar 4</b></label><br>
    @error('gambar4')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_4" id="gambar4"><br><br>

    <label for="option5"><b>Option 5*</b></label><br>
    @error('option5')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="text" name="option_5" id="option5"><br>
    <label for="gambar5"><b>gambar 5</b></label><br>
    @error('gambar5')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <input type="file" accept="image/png,image/jpg" name="gambar_5" id="gambar5"><br><br>

    <label for="benar">Jawaban Benar:</label>
    @error('benar')
        <h6 class="form-helper red-important">{{ $message }}</h6>
    @enderror
    <select name="benar" id="benar">
      <option value="0" selected hidden>Pilih Option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
      <option value="4">Option 4</option>
      <option value="5">Option 5</option>
    </select><br>
<button type="submit" class="registerbtn">Submit</button>
</form>