<?php

namespace App\Http\Controllers;
use App\Game;

use Illuminate\Http\Request;

class GamesController extends Controller
{

  /**
   * Return a list of all games
   */
  public function index()
  {

    $games = Game::all();

    return response()->json([
      'data' => $games,
    ], 200);
  }

  public function show(Game $game)
  {
    
  }
  
}
