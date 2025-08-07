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
    <p class=" text-center font-bold text-3xl text-white/70 mb-4">Insert Rating</p>
    <div class=" flex  gap-4 justify-center ">
        <div class=" flex flex-col gap-4">
            <label for="author">Book Author:</label>
            <label for="book">Book Name:</label>
            <p>Rating:</p>
        </div>
        <form method="POST" action="{{ url()->current() }}">
            @csrf
            <div class=" flex flex-col gap-4">
                <input list="authors_list" id="author_input" placeholder="Nama Author"
                    class="text-white bg-gray-700 px-2 rounded-sm" required>
                <datalist id="authors_list">
                    @foreach ($authors as $author)
                        <option data-id="{{ $author->id }}" value="{{ $author->name }}"></option>
                    @endforeach
                </datalist>



                <input name="book_title" list="books_list" id="book_input" name="book" placeholder="Nama Book"
                    class="text-white bg-gray-700 px-2 rounded-sm" required>
                <datalist id="books_list">
                    <!-- Akan diisi lewat JS -->
                </datalist>


                <select class=" py-1 text-white bg-gray-700 px-2 rounded-sm" name="rating" required>
                    @for ($i = 1; $i < 11; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

            </div>
            <button type="submit" class=" bg-blue-800 text-white px-2 py-1 w-full mt-4 rounded-sm">
                Submit
            </button>
        </form>
    </div>
    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-800 text-white px-4 py-2 rounded my-4 ">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="bg-red-800 text-white px-4 py-2 rounded my-4">
            {{ session('error') }}
        </div>
    @endif

</body>

<script>
    const authorInput = document.getElementById('author_input');
    const authorIdInput = document.getElementById('author_id');
    const authorsList = document.querySelectorAll('#authors_list option');
    const booksList = document.getElementById('books_list');

    // Generate Buku sesuai Author
    authorInput.addEventListener('input', function() {
        const inputVal = this.value;
        let selectedId = null;

        // Cari ID author yang sesuai dengan nama yang dipilih
        authorsList.forEach(option => {
            if (option.value === inputVal) {
                selectedId = option.dataset.id;
            }
        });


        if (!selectedId) {
            booksList.innerHTML = '';
            return;
        }

        // Fetch books berdasarkan author_id
        fetch(`/books-by-author/${selectedId}`)
            .then(res => res.json())
            .then(data => {
                booksList.innerHTML = '';
                data.forEach(book => {
                    const opt = document.createElement('option');
                    opt.value = book.title;
                    booksList.appendChild(opt);
                });
            })
            .catch(err => {
                console.error("Gagal fetch buku:", err);
            });
    });
</script>

</html>
