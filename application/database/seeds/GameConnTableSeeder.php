<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GameConnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_conn')->insert([
            'gs_ip' => 'proxy1.deadlyarena.com',
            'gs_port' => '443', 
            'media' => 'web', 
            'active_ip' => 'proxy1.deadlyarena.com/lobby1/' 
        ]);

        DB::table('game_conn')->insert([
            'gs_ip' => '103.12.212.8',
            'gs_port' => '7777', 
            'media' => 'mobile', 
            'active_ip' => '103.12.212.8' 
        ]);
        DB::table('game_conn')->insert([
            'gs_ip' => 'proxy1.deadlyarena.com',
            'gs_port' => '443', 
            'media' => 'web', 
            'active_ip' => 'proxy1.deadlyarena.com/lobby2/' 
        ]);
    }
}
