<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    public function index()
    {
        // Subquery: total voters per book
        $ratingSub = DB::table('ratings')
            ->select('book_id', DB::raw('COUNT(id) as total_voters'))
            ->groupBy('book_id');

        $min_rating = 5;
        // Query: total voters per author (with filter > min_rating)
        $authors = DB::table('authors')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->leftJoinSub($ratingSub, 'ratings_avg', function ($join) {
                $join->on('books.id', '=', 'ratings_avg.book_id');
            })
            ->select(
                'authors.id',
                'authors.name',
                DB::raw('COALESCE(SUM(ratings_avg.total_voters), 0) as total_voters')
            )
            ->groupBy('authors.id', 'authors.name')
            ->having('total_voters', '>', $min_rating)
            ->orderByDesc('total_voters')
            ->paginate(10);

        return view('authors', compact('authors'));
    }
}
