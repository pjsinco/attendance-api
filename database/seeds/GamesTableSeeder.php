<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class GamesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('games')->truncate();

    $reader = Reader::createFromPath(database_path() . '/data/games.csv');

    $games = $reader->fetch();

    $this->seedTable($games);
    
  }

  private function seedTable($games)
  {
    foreach($games as $game) {

      $date_time = Carbon\Carbon::createFromTimestamp($game[5], 'EST')
                    ->toDateTimeString();

      DB::table('games')->insert([
        'game_id'        => $game[0],
        'attendance'     => $game[1],
        'away'           => $game[2],
        'home'           => $game[3],
        'venue'          => $game[4],
        'date_time'      => $date_time,
        'game_type'      => $game[6],
        'status'         => $game[7],
        'home_is_winner' => $game[8],
      ]);
    }
  }
}
