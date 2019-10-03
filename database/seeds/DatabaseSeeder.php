<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		//User
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
		
		//Companies
        $this->call(CompaniesTableSeeder::class);
		
		//Adverts
        $this->call(AdvertsTableSeeder::class);
    }
}
