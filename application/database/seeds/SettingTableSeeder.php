<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 1; $i++) {
            $asset = new Setting(array(
                'company_name' => $faker->word(),
                'company_logo' => $faker->image('public',200,42, null, false),
                'game_name' => $faker->word(),
                'game_logo' => $faker->image('public',200,42, null, false),
                'hero_image' => $faker->image('public',1400,645, null, false),
                'hero_image_title' => $faker->word(),
                'hero_image_subtitle' => $faker->word(),
                'hero_image_description' => $faker->sentence(),
                'promotion_image' => $faker->image('public',1400,735, null, false),
                'promotion_title' => $faker->word(),
                'promotion_subtitle' => $faker->word(),
                'promotion_description' => $faker->sentence(),
                'blog_image' => $faker->image('public',1400,451, null, false),
                'postpage_image' => $faker->image('public',1400,451, null, false),
                'userpage_image' => $faker->image('public',1400,451, null, false),
                'footer_image' => $faker->image('public',1400,513, null, false),
                'footer_title' => $faker->word(),
                'footer_youtube' => 'https://www.youtube.com/',
                'footer_twiter' => 'https://www.youtube.com/',
                'footer_facebook' => 'https://www.youtube.com/',
                'footer_google' => 'https://www.youtube.com/',
            ));
            $asset->save();
        }
    }
}
