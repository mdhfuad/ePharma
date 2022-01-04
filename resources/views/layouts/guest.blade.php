<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>

    @stack('head')
</head>

<body class="border-top-wide border-primary d-flex flex-column">
    <main class="page page-center">
        <section class="container-tight py-4">
            {{ $slot }}
        </section>
    </main>
    @stack('scripts')
</body>

</html>
