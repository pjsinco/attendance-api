<?php

namespace Pjs\Transformers;

class GameTransformer extends Transformer
{

  public function transform($game)
  {
    return [
      'game_id'    => $game['game_id'],
      'attendance' => (int) $game['attendance'],
      'away'       => $game['away'],
      'home'       => $game['home'],
      'venue'      => $game['venue'],
      'date_time'  => $game['date_time'],
      'status'     => $game['status'],
      'home_won'   => (boolean) $game['home_is_winner'],
    ];
  }


}
