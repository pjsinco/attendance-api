<?php

namespace App\Http\Controllers;
use App\Game;
use App\Team;
use App\GameFilters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Carbon\Carbon;

class GamesController extends Controller
{

  /**
   * Return a list of all games
   */
  public function index(GameFilters $filters)
  {

    $games = Game::filter($filters)->get();

    if (count($games)) {
      return response()->json([
        'data' => $games,
        'errors' => [],
      ], 200);
    }

//    return response()->json([
//      'data' => [],
//      'errors' => [
//        'title' => 'Invalid team',
//        'detail' => 'Cannot find team',
//      ],
//    ], 404);

  }

  public function show(Game $game)
  {
    
  }
  
}
