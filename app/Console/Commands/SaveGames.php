<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Game;
use League\Csv\Reader;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use App\GameDBInsert;

class SaveGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:games 
                            {--f|file= : The CSV source file in storage/app/public}
                            {--D|delete : Delete the source file when finished}
                            {--H|headers : The source file has headers}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Persist games to the database from a CSV file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(GameDBInsert $gameSaver)
    {

      $filePath = storage_path('app/public/' . $this->option('file'));

      if (! file_exists($filePath)) {

        $this->error('Could not find the file ' . $this->option('file'));

      }

      $reader = Reader::createFromPath($filePath);

      if ($this->option('headers')) {
        $reader->setOffset(1); 
      }

      $games = $reader->fetch();

      foreach($games as $game) {

        if (empty($game)) { continue; }

        $inserted = false;

        try {

          $inserted = $gameSaver->save($game);

          if ($inserted) {
            $this->info('Saved '. $game[0]);
          } else {
            $this->comment('Problem inserting ' . $game[0]);
          }

        } catch (QueryException $qe) {
          if ($qe->getCode() == 23000) {
            $this->comment($game[0] . ' is already saved.');
          }
        } catch (PDOException $pdoe) {
          $this->comment($pdoe->getMessage());
        } catch (Exception $e) {
          $this->error($e->getMessage());
        }
      }

      if ($this->option('delete')) {
        // TODO
        // delete file
      }
    }
  
}
