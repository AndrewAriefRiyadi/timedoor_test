<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookFactory extends Factory
{
    
    protected $model = Book::class;
    
    public function definition()
    {
        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        return [
            'title' => fake()->sentence(3),
            'author_id' => fake()->randomElement($authorIds),
            'category_id' => fake()->randomElement($categoryIds)
        ];
    }
}

