<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('teams', function (Blueprint $table) {
        $table->char('abbrev', 3);
        $table->string('team');
        $table->string('nickname');
        $table->string('city');
        $table->char('state', 2);
        $table->enum('league', ['AL', 'NL']);
        $table->enum('division', ['East', 'Central', 'West']);

        $table->primary('abbrev');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('teams');
    }
}
