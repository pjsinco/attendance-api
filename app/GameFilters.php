<?php

namespace App;

use App\Game;
use App\QueryFilters;
use Carbon\Carbon;
use Pjs\Helpers;

/**
 * 
 */
class GameFilters extends QueryFilters
{
  public function team($teamId) // api/v1/mlb/attendance?team=kca
  {
    if ($this->request->input('away') === 'true') {
      return $this->builder->where('away', $teamId);
    } 

    return $this->builder->where('home', $teamId);
  }

  public function year($year = null) // api/v1/mlb/attendance?team=kca
  {
    $year = ($year !== null ? $year : (string) Carbon::yesterday()->year);

    return $this->builder->whereYear('date_time', $year);
  }

  public function month($month = 0) // api/v1/mlb/attendance?month=6
  {
    if ( ! isset($month) || (int) $month < 1 || (int) $month > 12) {
      throw new \InvalidArgumentException('Invalid value for month');
    }

    return $this->builder->whereMonth('date_time', Helpers::zeroPad($month));
  }

  public function day($day = 0) // api/v1/mlb/attendance?team=kca
  {
    if ((int) $day < 1 || (int) $day > 31) {
      throw new \InvalidArgumentException('Invalid value for day');
    }

    return $this->builder->whereDay('date_time', Helpers::zeroPad($day));
  }
}
