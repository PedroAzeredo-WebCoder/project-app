<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo ?? 'Título padrão' }}</title>
    {{--@vite('resources/scss/app.scss')--}}
    <link rel="stylesheet" href="{{ asset('build/assets/css/app.baxSU9ej.css') }}">
</head>

<body>
    @include('site.components.header')
    @yield('content')
</body>

{{--@vite('resources/js/app.ts')--}}
<script src="{{ asset('build/assets/js/app.BfizZ7gu.js') }}"></script>

</html>
