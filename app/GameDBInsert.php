<?php

namespace App;

use Carbon\Carbon;
use \DB;

/**
 * Persist Game models to the database.
 *
 */
class GameDBInsert extends DBInsert
{

  public function __construct()
  {
    $this->tableName = 'games';
  }

  /**
   * Insert a game into the database.
   *
   * @param array $game The game to insert
   * @return boolean Whether the games was inserted successfully
   */
  public function save($game)
  {

    $date_time = Carbon::createFromTimestamp($game[5], 'EST')
                   ->toDateTimeString();

    return DB::table($this->tableName)->insert([
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
