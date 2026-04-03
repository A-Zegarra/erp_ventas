<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <header style="padding: 16px; border-bottom: 1px solid #ddd;">
        {{ $header ?? '' }}
    </header>

    <main style="padding: 24px;">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
