<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Título padrão')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/app.B8p3F0Ej.css') }}">
</head>

<body>
    @include('site.components.header')
    @yield('content')
</body>

<script src="{{ asset('build/assets/js/app.Dsd7o7FW.js') }}"></script>

</html>
