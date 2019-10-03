<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('adverts')->insert([
            'name' => 'Colour',
            'description' => 'Single colour background and text.',
            'view_price_cents' => 0.05,
            'click_price_cents' => 1.25,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 2
        DB::table('adverts')->insert([
            'name' => 'Image',
            'description' => 'Single image background and text.',
            'view_price_cents' => 0.05,
            'click_price_cents' => 1.25,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 3
        DB::table('adverts')->insert([
            'name' => 'Gradient',
            'description' => 'Gradient background and text.',
            'view_price_cents' => 0.05,
            'click_price_cents' => 1.25,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 4
        DB::table('adverts')->insert([
            'name' => 'Coupon',
            'description' => 'Coupon for a single product.',
            'view_price_cents' => 0.10,
            'click_price_cents' => 2.5,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 5
        DB::table('adverts')->insert([
            'name' => 'Slide Show',
            'description' => 'Slide show of multiple pages with a single image background and text per slide.',
            'view_price_cents' => 0.10,
            'click_price_cents' => 2.5,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 6
        DB::table('adverts')->insert([
            'name' => 'Animation',
            'description' => 'Animate image or Text. Single animation for an element.',
            'view_price_cents' => 0.20,
            'click_price_cents' => 5,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 7
        DB::table('adverts')->insert([
            'name' => 'Survey',
            'description' => 'Survey with free text multiple choice options.',
            'view_price_cents' => 0.15,
            'click_price_cents' => 3.75,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 8
        DB::table('adverts')->insert([
            'name' => 'Wallpaper',
            'description' => 'Single image to be used as a Wallpaper for a users phone.',
            'view_price_cents' => 0.15,
            'click_price_cents' => 3.75,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 9
        DB::table('adverts')->insert([
            'name' => 'Video',
            'description' => 'Video advert.',
            'view_price_cents' => 0.20,
            'click_price_cents' => 5,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 10
        DB::table('adverts')->insert([
            'name' => 'Gif',
            'description' => 'Gif advert.',
            'view_price_cents' => 0.15,
            'click_price_cents' => 3.75,
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
