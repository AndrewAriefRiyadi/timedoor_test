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
    <div class=" mb-2  w-fit flex flex-col gap-2">
        <form action="{{ url()->current() }}" method="GET" class="mb-2 w-fit flex flex-col gap-2">
            <div>
                <p>List Shown:</p>
                <select name="per_page" class="bg-gray-700 px-2 py-1.5 w-full">
                    @for ($i = 10; $i <= 100; $i += 10)
                        <option value="{{ $i }}" {{ request('per_page') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <p>Search</p>
                <input name="search" value="{{ request('search') }}" class="bg-gray-700 px-2 w-fit" type="text">
            </div>
            <button type="submit" class="bg-blue-700 text-white">Submit</button>
        </form>
    </div>

    <table class="table-auto w-full">
        <thead class=" bg-gray-600">
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td class=" text-center">{{ $book->title }}</td>
                    <td class=" text-center">{{ $book->category->title }}</td>
                    <td class=" text-center">{{ $book->author->name }}</td>
                    <td class=" text-center">{{ $book->ovr_rating }}</td>
                    <td class=" text-end">{{ $book->total_voters }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="">
        {{ $books->links() }}
    </div>

</body>

</html>
