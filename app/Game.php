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
    try {
      $builder = $filters->apply($builder);
      return $builder;
    } catch (\Exception $e) {
      throw $e;
    }

  }
}
