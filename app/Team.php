<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

  protected $fillable = [
    'abbrev',
    'team',
    'nickname',
    'city',
    'state',
    'league',
    'division',
  ];
}
