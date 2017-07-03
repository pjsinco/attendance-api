<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class TeamsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('teams')->truncate();
  
    $reader = Reader::createFromPath(database_path() . '/data/teams.csv');

    $teams = $reader->fetch();

    $this->seedTable($teams);
  }


  private function seedTable($teams)
  {
    foreach($teams as $team) {
      DB::table('teams')->insert([
        'abbrev'   => $team[0],
        'team'     => $team[1],
        'nickname' => $team[2],
        'city'     => $team[3],
        'state'    => $team[4],
        'league'   => $team[5],
        'division' => $team[6],
      ]);
    }
  }
}
