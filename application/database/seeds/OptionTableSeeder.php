<?php

use Illuminate\Database\Seeder;
use App\Option; 

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++) {
            $option = new Option(array(
                'name' => $faker->word,
                'image' => $faker->image('public',500,375, null, false) 
            ));
            $option->save();
        }
        
    }
}
