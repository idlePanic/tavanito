<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function test_can_create_category()
    {
        $faker = \Faker\Factory::create();

        $data = [
            'name' => $faker->title,
        ];
        $this->post(route('categories.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
        return $data;
    }

    public function test_can_show_category() {
        $category = factory(Category::class)->create();
        $this->get(route('categories.show', $category->id))
            ->assertStatus(200);
    }
    public function test_can_delete_category() {
        $category = factory(Category::class)->create();
        $this->delete(route('categories.destroy', $category->id))
            ->assertStatus(204);
    }
    public function test_can_list_categories() {
        $categories = factory(Category::class, 2)->create()->map(function ($category) {
            return $category->only(['id', 'name']);
        });

        $this->get(route('categories.index'))
            ->assertStatus(200);
    }
}
