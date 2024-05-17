@extends('components.template.client')

@section('title', 'Login - ISAC 2022')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <h1>LOGIN</h1>
    <form action="{{ route('auth.login') }}" method="POST" class="login-container">
        @csrf
        <div class="form-group">
            <label class="form-label" for="namaTim">NAMA TIM</label>
            <input type="text" class="form-control" name="namaTim" id="namaTim"
                value="{{ Session::has('username') ? Session::get('username') : '' }}">
            @error('namaTim')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="password">PASSWORD</label>
            <input type="password" class="form-control" name="password" id="password">
            @error('password')
                <h6 class="form-helper red-important">{{ $message }}</h6>
            @enderror
        </div>
        {{-- <p>Belum punya akun? <a href="{{ route('regist') }}">Registrasi</a></p> --}}

        <button class="btn-secondary">LOGIN</button>
    </form>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
