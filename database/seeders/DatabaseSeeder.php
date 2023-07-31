<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Game::factory(33)->create()->each(function ($game){

           $numReviews = random_int(5,30);

           Review::factory()->count($numReviews)->good()->for($game)->create();
       });

        Game::factory(33)->create()->each(function ($game){

            $numReviews = random_int(5,30);

            Review::factory()->count($numReviews)->average()->for($game)->create();
        });

        Game::factory(33)->create()->each(function ($game){

            $numReviews = random_int(5,30);

            Review::factory()->count($numReviews)->bad()->for($game)->create();
        });
    }
}
