<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),        // Tên sách có 3 từ
            'author' => $this->faker->name,             // Tên tác giả
            'category' => $this->faker->word,           // Danh mục sách
            'year' => $this->faker->year,               // Năm xuất bản
            'quantity' => $this->faker->numberBetween(1, 100), // Số lượng từ 1-100
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}