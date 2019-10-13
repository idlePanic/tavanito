<?php

namespace Tests\Unit;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{



    public function test_can_create_post()
    {
        $faker = \Faker\Factory::create();
        $data = [
            'title' => $faker->sentence,
            'body' => $faker->paragraph,
        ];

        $this->post(route('post.store'), $data)
            ->assertStatus(201);
        return $data;
    }

    public function test_can_show_post() {
        $post = factory(Post::class)->create();
        $this->get(route('post.show', $post->id))
            ->assertStatus(200);
    }
    public function test_can_delete_post() {
        $post = factory(Post::class)->create();
        $this->delete(route('post.destroy', $post->id))
            ->assertStatus(204);
    }
    public function test_can_list_posts() {
        $posts = factory(Post::class, 2)->create()->map(function ($post) {
            return $post->only(['id', 'title', 'body']);
        });
        $this->get(route('post.index'))
            ->assertStatus(200);
    }
}
