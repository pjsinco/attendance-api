<?php

namespace Pjs\Transformers;

class GameEmailTransformer extends Transformer
{

  public function transform($game)
  {

    $home = App\Team::find($game['home']);
    $away = App\Team::find($game['away']);

    return [
      'home' => $home['team'],
      'away' => $away['team'],
    ];
  }

}
