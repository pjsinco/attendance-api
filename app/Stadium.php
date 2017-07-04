<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{

  protected $table = 'stadiums';

  public function teams()
  {
    return $this->belongsToMany('App\Team',
                                'stadium_team',
                                'stadium_id',
                                'team_id');
  }

}
