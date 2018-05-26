<?php

namespace App\Http\Controllers;
use App\Game;
use App\Team;
use App\GameFilters;
use Pjs\Transformers\GameTransformer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Carbon\Carbon;

class GamesController extends Controller
{
  protected $gameTransformer;

  public function __construct(GameTransformer $transformer)
  {
    $this->gameTransformer = $transformer;
  }

  /**
   * Return a list of all games
   */
  public function index(GameFilters $filters)
  {
    try {
      $games = Game::filter($filters)->get();

      return response()->json([
        'data' => $this->gameTransformer->transformCollection($games->toArray()),
        'errors' => [],
      ], 200);

    } catch(\Exception $e) {
      return response()->json([
        'data' => [],
        'errors' => [
          'message' => $e->getMessage(),
        ],
      ], 404);
    }
  }

  public function sum(GameFilters $filters)
  {
    try {
      $games = Game::filter($filters)->get();
      $filters = $filters->filters();
      $isAway = array_key_exists('away', $filters) && 
                filter_var($filters['away'], FILTER_VALIDATE_BOOLEAN);
      $team = $isAway ? $games->pluck('away') : $games->pluck('home');

      return response()->json([
        'data' => [
          'team' => $team->first(),
          'attendance' => $games->sum->attendance,
          'games' => $games->count(),
          'home_games' => ! $isAway,
        ],
        'errors' => [],
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'data' => [],
        'errors' => [
          'message' => $e->getMessage(),
        ],
      ], 404);
    }
  }
}
