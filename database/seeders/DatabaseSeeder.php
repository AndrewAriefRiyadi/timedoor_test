<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 1.000 authors
        Author::factory()->count(1000)->create();

        // 3.000 categories
        Category::factory()->count(3000)->create();

        // 100.000 books
        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $books = [];

        for ($i = 0; $i < 10000; $i++) {
            $books[] = [
                'title' => fake()->sentence(3),
                'author_id' => fake()->randomElement($authorIds),
                'category_id' => fake()->randomElement($categoryIds),
            ];
            if (count($books) >= 500) {
                Book::insert($books);
                $books = []; 
            }
        }
        if (count($books) > 0) {
            Book::insert($books);
        }

        // 500.000 ratings
        $bookIds = Book::pluck('id')->toArray();
        $ratings = [];

        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'rating' => fake()->numberBetween(1,10),
                'book_id' => fake()->randomElement($bookIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (count($ratings) >= 500) {
                Rating::insert($ratings);
                $ratings = [];
            }
        }
        if (count($ratings) > 0) {
            Rating::insert($ratings);
        }
    }
}
