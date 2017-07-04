<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class StadiumsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('stadiums')->truncate();

    $reader = Reader::createFromPath(database_path() . '/data/stadiums.csv');

    $stadiums = $reader->fetch();

    $this->seedTable($stadiums);
  }

  private function seedTable($stadiums)
  {
    foreach($stadiums as $stadium) {
      DB::table('stadiums')->insert([
        'name'   => $stadium[0],
        'capacity'   => $stadium[1],
      ]);
    }
  }

}
