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
        // Ambil Request Input dari URL (per_page=?&search=?)
        $search = request()->input('search');
        $perPage = request()->input('per_page', 10);

        // Mengambil Overall Rating dan Total voters dari tabel ratings dan dikelompokkan by book_id
        $ratingSub = DB::table('ratings')
            ->select('book_id', DB::raw('AVG(rating) as ovr_rating'), DB::raw('COUNT(id) as total_voters'))
            ->groupBy('book_id');

        // QUERY UTAMA | Gabungkan $ratingSub ke query utama
        $books = Book::query()
            ->leftJoinSub($ratingSub, 'ratings_avg', function ($join) {
                $join->on('books.id', '=', 'ratings_avg.book_id');
            }) // Fitur Search  by Book title or Author Name
            ->when($search, function ($query) use ($search) {
                $query->where('books.title', 'like', "%{$search}%")
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })// Ambil Relasi untuk Author dan Category
            ->with(['author', 'category'])
            ->select('books.*', 'ratings_avg.ovr_rating', 'ratings_avg.total_voters')
            ->orderByDesc('ratings_avg.ovr_rating') // Order berdasarkan overall rating tertinggi
            ->paginate($perPage) // Paginate dan tambahkan search dan per_page nya agar konsisten
            ->appends([
                'search' => $search,
                'per_page' => $perPage,
            ]);

        return view('books', compact('books'));
    }

}
