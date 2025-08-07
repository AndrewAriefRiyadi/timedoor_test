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

<body class=" font-mono antialiased bg-gray-900 text-white/50 mx-32 my-16 ">

    <div class=" flex flex-col justify-start gap-2 mb-6">
        <a href="/" class=" bg-gray-700 px-4 py-2 rounded text-white w-fit self-center">Home</a>
    </div>
    <p class=" text-center font-bold text-3xl mb-4 text-white/70">Top 10 Most Famous Author</p>
    <table class="table-auto w-full">
        <thead class=" bg-gray-600">
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td class=" text-center">{{$loop->iteration}}</td>
                    <td class="">{{$author->name}}</td>
                    <td class=" text-center">{{$author->total_voters}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
