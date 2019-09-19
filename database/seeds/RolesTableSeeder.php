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
            'name' => 'iMining',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 2
        DB::table('roles')->insert([
            'name' => 'Manager',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // 3
        DB::table('roles')->insert([
            'name' => 'Miner',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
