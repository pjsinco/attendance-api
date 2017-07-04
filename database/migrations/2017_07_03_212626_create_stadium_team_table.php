<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStadiumTeamTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stadium_team', function (Blueprint $table) {

      $table->integer('stadium_id')->unsigned();
      $table->char('team_id', 3);

      $table->foreign('team_id')
            ->references('abbrev')
            ->on('teams')
            ->onDelete('cascade');

      $table->foreign('stadium_id')
            ->references('id')
            ->on('stadiums')
            ->onDelete('cascade');

      $table->primary(['stadium_id', 'team_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('stadium_team');
  }
}
