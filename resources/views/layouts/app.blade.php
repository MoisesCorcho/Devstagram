<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @stack('styles')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-900">

        <x-Layout.Header>
        </x-Layout.Header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center  text-3xl mb-10 text-white">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <x-Layout.Footer>
        </x-Layout.Footer>

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    </body>
</html>
