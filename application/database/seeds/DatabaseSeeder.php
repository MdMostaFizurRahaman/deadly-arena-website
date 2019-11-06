<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(OptionTableSeeder::class);
        $this->call(PlayerTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(AssetTableSeeder::class);
        $this->call(AssetOptionTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(AssetPlayerTableSeeder::class);
        $this->call(GameConnTableSeeder::class);
       
    }
}
