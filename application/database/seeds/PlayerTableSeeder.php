<?php

use App\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PlayerTableSeeder extends Seeder
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
            $player = new Player(array(
                'player_name' => $faker->name(),
                'player_displayname' => $faker->userName,
                'email' => $faker->email,
                'player_password' => 'password',
                'player_country' => $faker->country,
                'player_dob' => $faker->date,
                'player_sex' => 'male',
                'player_status' => 1,
                'player_agent' => $faker->userAgent,
            ));
            $player->timestamps = false;
            $player->save();
        }
    }
}
