<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QueryFilter;

class Game extends Model
{

  public $primaryKey = 'game_id';
  public $incrementing = false;
  public $hidden = ['game_type'];

  protected $fillable = [
    'game_id',
    'attendance',
    'away',
    'home',
    'venue',
    'date_time',
    'game_type',
    'status',
    'home_is_winner',
  ];

  protected $dates = [
    'date_time',
  ];

  public function scopeFilter($builder, QueryFilter $filters)
  {
    return $filters->apply($builder);
  }

//  public function scopeTeam($query, $teamId)
//  {
//    return $query->where('home', $teamId);
//  }
//
//  public function scopeYear($query, $year)
//  {
//    return $query->whereYear('date_time', '=', $year);
//  }
//
//  public function scopeMonth($query, $month)
//  {
//    return $query->whereMonth('date_time', '=', $month);
//  }
//
//  public function scopeDay($query, $day)
//  {
//    return $query->whereYear('date_time', $day);
//  }
//
//  public function scopeVisiting($query, $teamId)
//  {
//    return $query->where('away', $teamId);
//  }

}
