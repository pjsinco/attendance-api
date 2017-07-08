<?php

namespace Pjs\Transformers;

class TeamTransformer extends Transformer
{

  public function transform($team)
  {

    return $team;

//    return [
//      'abbrev'   => $team['abbrev'],
//      'team'     => $team['team'],
//      'nickname' => $team['nickname'],
//      'city'     => $team['city'],
//      'state'    => $team['state'],
//      'league'   => $team['league'],
//      'division' => $team['division'],
//    ];
  }

}
