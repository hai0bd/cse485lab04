<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'name' => $faker->name,
                'author' => $faker->name,
                'category' => $faker->word,
                'year' => $faker->year,
                'quantity' => $faker->numberBetween(1, 100),

            ]);
        }
    }
}