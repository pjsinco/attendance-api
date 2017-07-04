<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class StadiumTeamTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('stadium_team')->truncate();

    $reader = Reader::createFromPath(database_path() . '/data/stadiums_teams.csv');

    $data = $reader->fetch();

    $this->seedTable($data);
  }

  private function seedTable($data)
  {
    foreach($data as $datum) {

//      $team = App\Team::find($datum[0]);
//      $stadium = App\Stadium::find($datum[1]);
//
//      $stadium->teams()->attach($team->abbrev);
//      $team->stadiums()->attach($stadium->id);

      DB::table('stadium_team')->insert([
        'team_id'        => $datum[0],
        'stadium_id'     => $datum[1],
      ]);
    }
  }

}
