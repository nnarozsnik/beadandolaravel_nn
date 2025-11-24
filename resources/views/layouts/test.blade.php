<!DOCTYPE html>
<html>
<head>
    <title>Logout teszt</title>
</head>
<body>
    @auth
        <p>Bejelentkezve: {{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Kijelentkezés</button>
        </form>
    @else
        <p>Nincs bejelentkezve</p>
    @endauth
</body>
</html>