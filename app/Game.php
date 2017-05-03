<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

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
}
