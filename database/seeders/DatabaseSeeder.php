<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(15)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

            // Create 10 random authors
    Author::factory(15)->create();

    // create 15 random posts
    Post ::factory(15)->create();


    //create 25 random comments
   Comment ::factory(25)->create();



    }


}
