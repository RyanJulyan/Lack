<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('companies')->insert([
            'companyName' => 'Lack',
            'companyDescription' => 'Lack',
            'industry' => 'Advertising',
            'company_status' => 'Active',
            'created_user_id' => 1,
            'updated_by_user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
