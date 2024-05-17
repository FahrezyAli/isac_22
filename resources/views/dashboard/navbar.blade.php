<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <div class="w3-sidebar w3-bar-block" style="width:25%">
        <ul>
            <li style="list-style: none"><a href="{{ Route('dashboard.admin') }}">Home</a></li>
            <li style="list-style: none"><a href="{{ Route('autentikasi.admin') }}">Autentikasi</a></li>
            <li style="list-style: none"><a href="{{ Route('peserta') }}">List Tim</a></li>
            <li style="list-style: none"><a href="{{ Route('auth.logout') }}">Log Out</a></li>
        </ul>
    </div>

    <div style="margin-left:25%">
      @yield('content')
    </div>
</body>
</html>
