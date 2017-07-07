<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\GameDBInsert;

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

    $this->seedTable($games, new GameDBInsert);
    
  }

  private function seedTable($games, GameDBInsert $gameSaver)
  {

    foreach($games as $game) {

      $gameSaver->save($game);

    }
  }
}
