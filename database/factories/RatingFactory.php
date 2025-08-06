<?php


namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition()
    {
        $ratingIds = Rating::pluck('id')->toArray();
        return [
        'rating' => fake()->numberBetween(1,10),
        'book_id' => fake()->randomElement($ratingIds)
    ];
    }
}

