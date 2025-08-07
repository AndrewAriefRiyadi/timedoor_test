<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    { 
        $perPage = request()->input('per_page',10);
        $books = Book::with(['author', 'category'])
            ->withAvg('rating as ovr_rating', 'rating')
            ->withCount('rating as total_voters')
            // ->orderByDesc('ovr_rating')
            ->paginate($perPage);
        return view('books', compact('books'));
    }
}
