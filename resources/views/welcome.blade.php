<!DOCTYPE html>
<html>
<head>
    <title>Login Google Laravel</title>
</head>
<body>

@if(session('user'))

    <img src="{{ session('user.picture') }}" width="60">

    <h2>{{ session('user.name') }}</h2>

    <p>{{ session('user.email') }}</p>

    <a href="/logout">
        Logout
    </a>

@else

    <a href="/auth/google">
        Login Dengan Google
    </a>

@endif

</body>
</html>