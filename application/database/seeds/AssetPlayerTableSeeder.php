<?php

use Illuminate\Database\Seeder;

use App\Asset;
use App\Player;
use Illuminate\Support\Carbon;

class AssetPlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $assets = Asset::all()->pluck('id')->toArray();
        $players = Player::all()->pluck('id_player')->toArray();
        $faker = Faker\Factory::create();


        for($i = 0; $i < 50; $i++) {
            DB::table('asset_player')->insert(array(
                'asset_id' => $faker->randomElement($assets),
                'player_id' => $faker->randomElement($players) ,
                'amount' => $faker->numberBetween($min = 10, $max = 100), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),          
            ));
        }
    }
}
