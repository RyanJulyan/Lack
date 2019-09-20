<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 2
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 3
        DB::table('roles')->insert([
            'name' => 'Team Manager',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 4
        DB::table('roles')->insert([
            'name' => 'Content Manager',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 5
        DB::table('roles')->insert([
            'name' => 'User',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
