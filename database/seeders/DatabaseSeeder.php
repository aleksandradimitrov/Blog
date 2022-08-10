<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
        // Comment::truncate();
        // User::truncate();
        // Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        $user2 = User::factory()->create([
            'name' => 'John Joe'
        ]);

        for ($i = 1; $i < 6; $i++) {
            Category::factory()->create([
                'id' => $i
            ]);
            if ($i % 2 === 0) {
                Post::factory(5)->create([
                    'user_id' => $user->id,
                    'category_id' => $i
                ]);
            } else {
                Post::factory(5)->create([
                    'user_id' => $user2->id,
                    'category_id' => $i
                ]);
            }
        }
    }
}
