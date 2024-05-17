@extends('components.template.client')

@section('title', 'Registrasi Tim - ISAC 2022')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/regis.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <div class="title">
        <h1 class="above">REGISTER YOUR TEAM</h1>
        <h1 class="under">TO PARTICIPATE THE EVENT</h1>
        <p>You can participate in competition, talkshow about IT, FunGames, Bootcamp, and many things.</p>
    </div>
    <div class="form-container">
        <div class="form-title">
            <h1>REGISTER</h1>
            <p>to participate in the ISAC event</p>
        </div>
        <form action="{{ route('auth.regist') }}" method="post" class="regis-form">
            @csrf
            <div class="form-input">
                <div class="form-section">
                    <div class="form-group">
                        <label class="form-label" for="namaTim">NAMA TIM</label>
                        <input type="text" class="form-control" name="namaTim" id="namaTim"
                            value="{{ old('namaTim') ? old('namaTim') : '' }}">
                        @error('namaTim')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">EMAIL TIM</label>
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ old('email') ? old('email') : '' }}">
                        @error('email')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ old('password') ? old('password') : '' }}">
                        @error('password')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-group">
                        <label class="form-label" for="provinsiSekolah">PROVINSI SEKOLAH</label>
                        <select name="provinsiSekolah" id="provinsiSekolah" class="form-control">
                            <option value="" selected disabled>Pilih provinsi sekolah</option>
                            @foreach ($listProv as $prov)
                                <option @if (array_search($prov, $listProv, true) == old('provinsiSekolah')) selected @endif value="{!! array_search($prov, $listProv, true) !!}">
                                    {{ $prov }}</option>
                            @endforeach
                        </select>
                        @error('provinsiSekolah')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="kotaSekolah">KOTA SEKOLAH</label>
                        <select name="kotaSekolah" id="kotaSekolah" class="form-control"
                            data-old="{{ old('kotaSekolah') }}"></select>
                        @error('kotaSekolah')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="asalSekolah">NAMA SEKOLAH</label>
                        <input type="text" class="form-control" name="asalSekolah" id="asalSekolah"
                            value="{{ old('asalSekolah') ? old('asalSekolah') : '' }}">
                        @error('asalSekolah')
                            <h6 class="form-helper red-important">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-btn">
                <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
                <button type="submit" class="btn-secondary">REGISTRASI</button>
            </div>
        </form>
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('/assets/js/registrasi.js') }}"></script>
@endsection
