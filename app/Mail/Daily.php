<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pjs\Transformers\GameEmailTransformer;
use Pjs\DescriptiveStats;
use \App\Game;
use \App\Team;

class Daily extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {

    $yesterday = \Carbon\Carbon::yesterday();

    $games = Game::gamesForDay($yesterday)->get();

    // Attach some statistics to the game object
    foreach ($games as $game) {

      $allGames = $game->allTeamAttendance($game->home, $yesterday->year);

      $seasonAvg = 
        (int) round($game->teamSeasonAverage($game->home, $yesterday->year));

      $z = DescriptiveStats::zScore($game->attendance, $allGames);

      $stdDev = DescriptiveStats::standardDev($allGames);

      $game->seasonAvg = $seasonAvg;
      $game->z = round($z, 3);
      $game->stdDev = round($stdDev, 3);
    }

    return $this->text('emails.daily')
                ->with([
                  'games' => $games,
                  'date' => $yesterday->toFormattedDateString(), 
                ]);
  }
}
