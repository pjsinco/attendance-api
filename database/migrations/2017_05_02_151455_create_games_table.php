<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
          $table->char('game_id', 26);
          $table->integer('attendance');
          $table->char('away', 3);
          $table->char('home', 3);
          $table->string('venue', 128);
          $table->integer('date_time');
          $table->char('game_type', 1);
          $table->char('status', 1);
          $table->integer('home_is_winner');

          $table->primary('game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
