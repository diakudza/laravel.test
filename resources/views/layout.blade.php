<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

@auth()
    Hello, {{ Auth::user()->name }}
@endauth
@guest()
    Guest
@endguest

@if (session()->has('message'))
    <p>{{session('message')}}</p>
@endif
<br>
<a href="{{ route('home')}}">Home</a> @guest <a href="{{ route('auth')}}">Login</a>@endguest @auth()<a href="{{ route('logout')}}">Logout</a>@endauth

@yield('content')
</body>
</html>


