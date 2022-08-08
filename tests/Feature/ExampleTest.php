<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public $posts;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --seed');
        $this->posts = Post::all();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {


        $response = $this->get('/');

        $response->assertSeeText($this->posts[0]->title);

        $response->assertSeeText($this->posts[1]->title);
    }
}
