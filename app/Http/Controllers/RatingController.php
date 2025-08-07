<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('rating', compact(['authors']));
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'book_title' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:10']
        ]);

        try {
            $book = Book::where('title', $validatedData['book_title'])->first();
            Rating::create([
                'book_id' => $book->id,
                'rating' => $validatedData['rating']
            ]);
            return back()->with('success', 'Berhasil memberikan rating :D');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal menyimpan rating.')->withInput();
        }
    }

    public function booksByAuthor($authorId)
    {
        return \App\Models\Book::where('author_id', $authorId)
            ->select('id', 'title')
            ->get();
    }
}
