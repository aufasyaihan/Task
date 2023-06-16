<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div
            class=" bg-gradient-to-tr from-slate-800 to-slate-700 w-1/2 p-16 text-center dark:text-white rounded-lg uppercase">
            <div class="mb-5 font-bold tracking-wider text-4xl">quiz pemrograman web ii</div>
            <a class="uppercase bg-slate-500 hover:bg-slate-600 rounded-full py-2 px-4 text-lg font-semibold"
                href="{{ url('task') }}">start</a>
        </div>
    </div>
</body>

</html>
