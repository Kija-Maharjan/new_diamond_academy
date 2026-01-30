<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    "<title img src="../nda_logo.png" alt="New Diamond Academy Logo" width="50" height="50"></title>
    <title>@yield('title', 'My Laravel App')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('head')
</head>

<body>

    @yield('content')

</body>
</html>
