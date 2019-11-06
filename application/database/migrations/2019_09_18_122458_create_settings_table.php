<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('game_name')->nullable();
            $table->string('game_logo')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_image_title')->nullable();
            $table->string('hero_image_subtitle')->nullable();
            $table->string('hero_image_description')->nullable();
            $table->string('promotion_image')->nullable();
            $table->string('promotion_title')->nullable();
            $table->string('promotion_subtitle')->nullable();
            $table->string('promotion_description')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('postpage_image')->nullable();
            $table->string('userpage_image')->nullable();
            $table->string('footer_image')->nullable();
            $table->string('footer_title')->nullable();
            $table->string('footer_youtube')->nullable();
            $table->string('footer_twiter')->nullable();
            $table->string('footer_facebook')->nullable();
            $table->string('footer_google')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
