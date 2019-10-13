<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0 ; $i < 50 ; $i++){
            Tag::create([
                'name' => $faker->title,
            ]);
        }
    }
}
