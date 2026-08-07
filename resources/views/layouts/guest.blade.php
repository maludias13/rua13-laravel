<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col md:flex-row">
            <div class="hidden md:block md:w-1/2">
                <img src="{{ asset('media/foto-login1.png') }}" alt="Imagem de login" class="w-full h-full object-cover">
            </div>

            <div class="w-full md:w-1/2 flex items-center justify-center bg-white px-6 py-12">
                <div class="w-full max-w-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>