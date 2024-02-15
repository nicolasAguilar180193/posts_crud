<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()
            ->count(2)
            ->create();

        Post::factory()
            ->count(6)
            ->for(User::factory()->state([
                'name' => 'Nicolas Aguilar',
                'email' => 'nico@gmail.com',
            ]))
            ->state(new Sequence(
                fn(Sequence $sequence) => ['category_id' => Category::all()->random()],
            ))
            ->create();
    }
}