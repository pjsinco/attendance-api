Games for {{ $date }}

@foreach ($games as $game)
  {{ $game->away }} at {{ $game->home }}
  Attendance:     {{ $game->attendance }}
  Season average: {{ $game->seasonAvg }}
  Standard Dev:   {{ $game->stdDev }}
  Z Score:        {{ $game->z }}

  ------------------------------------------------------------------------ 
@endforeach
