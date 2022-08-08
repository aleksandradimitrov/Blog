<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::truncate();
        Category::truncate();
        Post::truncate();
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




        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'Work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-first-post', 
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Morbi viverra vehicula nesl eget blandit.</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post',
        //     'slug' => 'my-second-post', 
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Morbi viverra vehicula nesl eget blandit.</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My Personal Post',
        //     'slug' => 'my-third-post', 
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Morbi viverra vehicula nesl eget blandit.</p>'
        // ]);


    }
}
