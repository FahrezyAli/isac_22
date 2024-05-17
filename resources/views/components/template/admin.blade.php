@extends('components.template.general')

@section('navbar')
    @include('components.navbar.admin')
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
@endsection

@section('template-needs', 'container-admin')

@section('template-admin-needs')
    <div class="container container-admin-mobile">
        <h2>Maaf :(</h2>
        <h3>Mohon gunakan <span>laptop</span> atau <span>PC</span> untuk mengakses halaman admin. <br>
            Terima Kasih!</h3>
    </div>
@endsection
