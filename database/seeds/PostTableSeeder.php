<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

Class MakeTag{

    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }
}

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();



        for ($i = 0; $i < 5; $i++) {

            $data = json_encode(['tag' => [$faker->title, $faker->title]]);

            Post::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'tags' => $data
            ]);
        }

}
}
