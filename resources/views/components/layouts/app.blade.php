<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    <title>{{ $title ?? 'ONDA' }}</title>
</head>

<body class="bg-[#D9D9D9]  font-poppins">
    @if (!request()->is('login'))
        @livewire('partials.sidebar')
    @endif

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
