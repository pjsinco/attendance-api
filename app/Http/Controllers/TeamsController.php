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

  public function index()
  {
    $data = $this->teamTransformer->transformCollection(Team::all()->toArray());
    return $this->respond($data);
  }

  public function show(Request $request, $abbrev)
  {
    try {
      $team = Team::findOrFail($abbrev);
      $this->setStatusCode(200);
    } catch (ModelNotFoundException $mnfe) {
      $this->setStatusCode(404);
      return $this->respondNotFound('Could not find team');
    }
    
    return $this->respond($this->teamTransformer->transform($team->toArray()));
  }
}
