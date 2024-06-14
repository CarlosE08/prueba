<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Writer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'category_id' => Category::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'editorials_id' => Editorial::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            $writers = Writer::factory()->count(1)->create();
            $book->writers()->attach($writers);
        });
    }
}

