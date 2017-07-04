<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

  public $primaryKey = 'abbrev';
  public $incrementing = false;

  protected $fillable = [
    'abbrev',
    'team',
    'nickname',
    'city',
    'state',
    'league',
    'division',
  ];

  
  public function stadiums()
  {
    return $this->belongsToMany('App\Stadium', 
                                'stadium_team',
                                'team_id',
                                'stadium_id');
  }
}
