<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="h-full">
        {{ $slot }}

        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>

