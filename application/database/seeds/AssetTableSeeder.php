<?php

use Illuminate\Database\Seeder;
use App\Asset;
use App\Category;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  Category::all()->pluck('id')->toArray();
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            $asset = new Asset(array(
                'name' => $faker->word(),
                'image' => $faker->image('public',500,375, null, false) ,
                'price' => $faker->numberBetween($min = 100, $max = 1000),           
                'description' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                'category_id' => $faker->randomElement($categories),
                'status' => $faker->randomElement($array = array ('active','inactive')),
            ));
            $asset->save();
        }
    }
}
