<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Faker\Factory::create();

        for($i = 0; $i < 8; $i++) {
            $category = new Category(array(
                'name' => $faker->word,
                'image' => $faker->image('public',500,375,null, false) 
            ));
            $category->save();
        }
    }
}
