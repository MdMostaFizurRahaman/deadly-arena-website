<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Asset;
use App\Option;

class AssetOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $assets = Asset::all()->pluck('id')->toArray();
        $options = Option::all()->pluck('id')->toArray();
        $faker = Faker\Factory::create();


        for($i = 0; $i < 50; $i++) {
            DB::table('asset_option')->insert(array(
                'asset_id' => $faker->randomElement($assets),
                'option_id' => $faker->randomElement($options) ,
                'value' => $faker->numberBetween($min = 10, $max = 100),           
            ));
        }
    }
}
