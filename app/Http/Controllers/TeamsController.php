<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Team;
use Pjs\Transformers\TeamTransformer;

class TeamsController extends ApiController
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

        $this->setStatusCode(200);

        return $this->respond($this->teamTransformer->transform($team->toArray()));

      } catch (ModelNotFoundException $mnfe) {

        $this->setStatusCode(404);

        return $this->respondNotFound('Could not find team');
      }
    }

    $data = $this->teamTransformer->transformCollection(Team::all()->toArray());

    return $this->respond($data);
  }
}
