<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(TeamsTableSeeder::class);
       $this->call(StadiumsTableSeeder::class);
       $this->call(StadiumTeamTableSeeder::class);

       $this->call(GamesTableSeeder::class);
    }
}
