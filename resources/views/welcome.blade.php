<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class=" font-mono antialiased bg-gray-900 text-white/50 ">
        <div class=" flex flex-col justify-center items-center gap-16 h-screen m-auto text-xl ">
            <a href="{{ route("books")}}" class=" bg-gray-700 px-4 py-2 rounded text-white">List of Books</a>
            <a href="{{ route("authors")}}" class=" bg-gray-700 px-4 py-2 rounded text-white">List of Famous Author</a>
            <a href="{{ route("rating")}}" class=" bg-gray-700 px-4 py-2 rounded text-white">Input Rating</a>
        </div>
    </body>
</html>
