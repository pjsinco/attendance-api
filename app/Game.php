<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QueryFilter;
use Pjs\Helpers;

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

  public function scopeTeamSeasonAverage($query, $teamId, $year)
  {
    $year = ($year ? $year : \Carbon\Carbon::yesterday()->year);

    return $this->where('home', $teamId)
                ->whereYear('date_time', (string) $year)
                ->pluck('attendance')->avg();
  }
  

  /**
   * Create an array of attendance figures for a team in a season.
   *
   * @param Builder $query
   * @param string $teamId
   * @param string $year
   * @return array All the season's attendance figures
   */
  public function scopeAllTeamAttendance($query, $teamId, $year)
  {
    $year = ($year ? $year : \Carbon\Carbon::yesterday()->year);

    $allAttendance =  $this->where('home', $teamId)
                           ->whereYear('date_time', (string) $year)
                           ->pluck('attendance')->toArray();

    return $allAttendance;
  }

  public function scopeGamesForDay($query, \Carbon\Carbon $date)
  {
    return $query->whereMonth('date_time', (string) Helpers::zeroPad($date->month))
                 ->whereDay('date_time', (string) Helpers::zeroPad($date->day))
                 ->whereYear('date_time', (string) $date->year);
  }

  public function scopeYesterday($query)
  {
    $yesterday = \Carbon\Carbon::yesterday();

    return $this->gamesForDay($yesterday);
  }

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
