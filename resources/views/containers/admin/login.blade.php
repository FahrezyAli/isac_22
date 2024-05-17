@extends('components.template.admin')

@section('title', '')

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', 'login')
@section('content')
    <form method="POST" action="{{ route('auth.admin') }}" class="login__form">
        @csrf
        <h1 class="login__title">login</h1>
        <div class="login__form-input">
            <div class="form-group">
                <label class="form-label" for="namaTim">Username</label>
                <input type="text" class="form-control" name="namaTim" id="namaTim"
                    value="{{ old('namaTim') ? old('namaTim') : '' }}">
                @error('namaTim')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                    value="{{ old('password') ? old('password') : '' }}">
                @error('password')
                    <h6 class="form-helper red-important">{{ $message }}</h6>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn-admin">LOGIN</button>
    </form>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
