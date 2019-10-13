<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     */
    public function test_create_tag()
    {
        $faker = \Faker\Factory::create();
        $data = [
            'name' => $faker->title,
        ];

        $this->post(route('tags.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
        return $data;
    }

    public function test_can_show_tags() {
        $post = factory(Tag::class)->create();
        $this->get(route('tags.show', $post->id))
            ->assertStatus(200);
    }

    public function test_can_delete_tag() {
        $post = factory(Tag::class)->create();
        $this->delete(route('tags.destroy', $post->id))
            ->assertStatus(204);
    }
    public function test_can_list_posts() {
        $tags = factory(Tag::class, 2)->create()->map(function ($tag) {
            return $tag->only(['id', 'name']);
        });
        $this->get(route('tags.index'))
            ->assertStatus(200);
    }
}
