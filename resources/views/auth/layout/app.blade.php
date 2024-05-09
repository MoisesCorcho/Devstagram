<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>
<body>

    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-900">

        <div class="bg-gray-800 p-6 rounded-lg shadow-xl content-start mb-6" style="width: 400px;">
            <div class="text-center mb-2 block uppercase font-bold mb-6">
                <h1 class="text-4xl text-white">{{ $header }}</h1>
            </div>

            <p class="text-gray-300 mt-2 mb-6 text-center font-bold">{{ $contentHeader }}</p>

            <div class="flex items-center justify-between mb-6">
                <!-- Línea 1 -->
                <hr class="my-4 border-gray-300 w-40">
                <!-- Texto "O" -->
                <p class="mx-4 text-gray-500">O</p>
                <!-- Línea 2 -->
                <hr class="my-4 border-gray-300 w-40">
            </div>

            {{ $slot }}

        </div>

        <div class="bg-gray-800 p-6 rounded-lg shadow-xl content-start" style="width: 400px;">
            <div class="text-center justify-center flex flex-row">
                <p class="mr-2 text-white">{{ $contentFooter }}</p>
                <a href="{{ route($footerButtonRoute) }}" class="text-sky-600 font-bold">{{ $footerButton }}</a>
            </div>
        </div>

    </div>


</body>

</html>
