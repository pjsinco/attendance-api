<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Team;
use Pjs\Transformers\TeamTransformer;

class TeamsController extends Controller
{

  protected $teamTransformer;

  public function __construct(TeamTransformer $transformer)
  {
    $this->teamTransformer = $transformer;
  }

  public function index(Request $request, $abbrev = null)
  {

    if ($abbrev) {

      try {

        $team = Team::findOrFail($abbrev);

        return response()->json([
          'data' => $this->teamTransformer->transform($team),
          'errors' => [],
        ], 200);

      } catch (ModelNotFoundException $mnfe) {

        return response()->json([
          'data' => [],
          'errors' => [
            'message' => 'Could not find team',
          ],
        ], 404);
      }
    }

    return response()->json([
      'data' => $this->teamTransformer->transformCollection(Team::all()->toArray()),
      'errors' => [],
    ], 200);

  }

}
