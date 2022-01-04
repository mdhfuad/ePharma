<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />

    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />

    @stack('head')
</head>

<body {{ $attributes }}>
    <div class="page">
        @include('layouts.sidebar')

        <main class="page-wrapper">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
