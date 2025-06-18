<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kinološki savez</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @if(Auth::check())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Odjava</button>
    </form>
@endif

</body>
</html>
