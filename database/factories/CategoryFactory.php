<?php


namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
        'title' => fake()->word()
    ];
    }
}

