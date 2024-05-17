<h1>LANDING</h1>
<h2>KAMU UDAH LOGIN {{ $namaTim }}</h2>
<a href={{ route('dashboard',$namaTim) }}>dashboard</a><br>
<form method="get" action="{{ route('auth.logout') }}">
    <button type="submit" class="logoutbtn">Log Out</button>
</form>