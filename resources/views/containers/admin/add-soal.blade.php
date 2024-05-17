@extends('components.template.admin')

@section('title', 'Add Soal Olimpiade')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/add-soal.css') }}">
@endsection

@section('contentclass', 'add-soal')
@section('content')
    <div class="title-form">
        <h1 class="title">Add Soal Olympiad</h1>
        <a href="{{ route('soal_olim') }}" class="button btn-secondary">LIST SOAL</a>
    </div>
    <form action="{{ route('create-soal') }}" method="post" enctype="multipart/form-data" class="form-admin">
        @csrf
        <div class="question">
            <textarea name="soal" id="soal" rows="5" placeholder="Masukkan soal disini...">{{ old('soal') ? old('soal') : '' }}</textarea>
            @error('soal')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
            <div class="wrap-input">
                <input type="file" accept="image/png,image/jpg" class="hidden input-file" name="gambar_soal"
                    id="gambar_soal">
                <label for="gambar_soal" class="button btn-input">UNGGAH FOTO</label>
            </div>
            <img src="" alt="" class="view-gambar">
            @error('gambar_soal')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
        </div>

        <div class="choice">
            <p>A</p>
            <div class="choice-input">
                <textarea name="option_1" id="option_1" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_1') ? old('option_1') : '' }}</textarea>
                @error('option_1')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <div class="wrap-input">
                    <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_1"
                        id="gambar_1">
                    <label for="gambar_1" class="button btn-input">UNGGAH FOTO</label>
                </div>
                <img src="" alt="" class="view-gambar">
                @error('gambar_1')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>

        <div class="choice">
            <p>B</p>
            <div class="choice-input">
                <textarea name="option_2" id="option_2" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_2') ? old('option_2') : '' }}</textarea>
                @error('option_2')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <div class="wrap-input">
                    <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_2"
                        id="gambar_2">
                    <label for="gambar_2" class="button btn-input">UNGGAH FOTO</label>
                </div>
                <img src="" alt="" class="view-gambar">
                @error('gambar_2')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>

        <div class="choice">
            <p>C</p>
            <div class="choice-input">
                <textarea name="option_3" id="option_3" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_3') ? old('option_3') : '' }}</textarea>
                @error('option_3')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <div class="wrap-input">
                    <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_3"
                        id="gambar_3">
                    <label for="gambar_3" class="button btn-input">UNGGAH FOTO</label>
                </div>
                <img src="" alt="" class="view-gambar">
                @error('gambar_3')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>

        <div class="choice">
            <p>D</p>
            <div class="choice-input">
                <textarea name="option_4" id="option_4" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_4') ? old('option_4') : '' }}</textarea>
                @error('option_4')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <div class="wrap-input">
                    <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_4"
                        id="gambar_4">
                    <label for="gambar_4" class="button btn-input">UNGGAH FOTO</label>
                </div>
                <img src="" alt="" class="view-gambar">
                @error('gambar_4')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>

        <div class="choice">
            <p>E</p>
            <div class="choice-input">
                <textarea name="option_5" id="option_5" rows="2" placeholder="Masukkan opsi disini...">{{ old('option_5') ? old('option_5') : '' }}</textarea>
                @error('option_5')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
                <div class="wrap-input">
                    <input type="file" accept="image/png, image/jpg" class="hidden input-file" name="gambar_5"
                        id="gambar_5">
                    <label for="gambar_5" class="button btn-input">UNGGAH FOTO</label>
                </div>
                <img src="" alt="" class="view-gambar">
                @error('gambar_5')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>


        <div class="select-div">
            <label for="benar">Jawaban benar : </label>
            <select class="form-control list__dropdown" name="benar" id="benar">
                <option value="" selected disable>Pilih opsi jawaban yang benar</option>
                <option value="1">Jawaban yang benar adalah A</option>
                <option value="2">Jawaban yang benar adalah B</option>
                <option value="3">Jawaban yang benar adalah C</option>
                <option value="4">Jawaban yang benar adalah D</option>
                <option value="5">Jawaban yang benar adalah E</option>
            </select>
            @error('benar')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
        </div>
        <button class="btn-secondary" type="submit">Submit</button>
    </form>
@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/add-soal.js') }}"></script>
@endsection
