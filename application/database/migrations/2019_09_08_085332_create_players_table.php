<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id_player');
            $table->string('player_name')->nullable();
            $table->string('player_displayname')->nullable()->unique('player_displayname_UNIQUE');
            $table->string('email')->nullable();
            $table->string('player_password')->nullable();
            $table->string('player_country')->nullable();
            $table->date('player_dob')->nullable();
            $table->string('player_sex')->nullable();
            $table->string('player_google')->nullable()->index('player_google_INDX');
            $table->string('player_fb')->nullable()->index('player_fb_INDX');
            $table->string('player_ip')->nullable();
            $table->integer('player_status')->default(1);
            $table->string('player_agent')->nullable();
            $table->integer('d_bot')->nullable();
            $table->string('a_bot')->nullable();
            $table->integer('d_weapon')->nullable();
            $table->string('a_weapon')->nullable();
            $table->integer('d_helmet')->nullable();
            $table->string('a_helmet')->nullable();
            $table->integer('d_vest')->nullable();
            $table->string('a_vest')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->index(['email', 'player_password'], 'player_email_INDX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
