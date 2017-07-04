<?php

namespace App;

use App\Game;
use App\QueryFilter;
use Carbon\Carbon;

/**
 * 
 */
class GameFilters extends QueryFilter
{


  public function team($teamId) // api/v1/mlb/attendance?team=kca
  {
    if ($this->request->input('visiting') === 'true') {
      return $this->builder->where('away', $teamId);
    } 

    return $this->builder->where('home', $teamId);
  }

  public function year($year) // api/v1/mlb/attendance?team=kca
  {
    $year = ($year ?: Carbon::yesterday()->year);

    return $this->builder->whereYear('date_time', $year);
  }

  public function month($month) // api/v1/mlb/attendance?month=6
  {
    return $this->builder->whereMonth('date_time', $this->zeroPad($month));
  }

  public function day($day) // api/v1/mlb/attendance?team=kca
  {
    return $this->builder->whereDay('date_time', $this->zeroPad($day));
  }

  private function zeroPad($num)
  {
    return sprintf('%02s', $num);
  }

}
