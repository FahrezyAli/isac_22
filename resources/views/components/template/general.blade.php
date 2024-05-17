<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{ url('assets/css/env.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/alert.css') }}">
    @yield('extracss')

    {{-- Favicon --}}
    <link rel="shortcut" href="{{ url('assets/img/favicon.svg') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('assets/img/favicon.svg') }}" type="image/x-icon">

    {{-- SEO --}}
    <meta name="description" content="@yield('seo-desc')">
    <meta name="canonical" href=""> {{-- ini buat optimize page --}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('seo-desc')">
    <meta property="og:image" content="@yield('seo-img')">
</head>

<body>
    @if (Session::has('info'))
        <div class="alert alert--info">
            <div class="alert__content">
                <img class="alert__img" src="{{ url('assets/img/alert-info.svg') }}" alt="">
                <h4 class="alert__message">{{ Session::get('info') }}</h4>
            </div>
            <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="alert alert--danger">
            <div class="alert__content">
                <img class="alert__img" src="{{ url('assets/img/alert-danger.svg') }}" alt="">
                <h4 class="alert__message">{{ Session::get('danger') }}</h4>
            </div>
            <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert--error">
            <div class="alert__content">
                <img class="alert__img" src="{{ url('assets/img/alert-error.svg') }}" alt="">
                <h4 class="alert__message">{{ Session::get('error') }}</h4>
            </div>
            <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
        </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert--warning">
            <div class="alert__content">
                <img class="alert__img" src="{{ url('assets/img/alert-warning.svg') }}" alt="">
                <h4 class="alert__message">{{ Session::get('warning') }}</h4>
            </div>
            <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert--success">
            <div class="alert__content">
                <img class="alert__img" src="{{ url('assets/img/alert-success.svg') }}" alt="">
                <h4 class="alert__message">{{ Session::get('success') }}</h4>
            </div>
            <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
        </div>
    @endif

    @yield('navbar')

    <div class="container  @yield('template-needs') @yield('contentclass')">
        @yield('content')
    </div>

    @yield('template-admin-needs')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('/assets/js/navscript.js') }}"></script>
    @yield('extrajs')
</body>

</html>
