<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            $post = new Post(array(
                'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'description' => $faker->paragraph($nbSentences = 50, $variableNbSentences = true),
                'author' => $faker->name(),
                'image' => $faker->image('public',500,375, null, false) 
            ));
            $post->save();
        }
    }
}
