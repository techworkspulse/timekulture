<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('puzzle_id');
            $table->integer('player_id');
            $table->integer('minutes');
            $table->integer('seconds');
            $table->integer('moves');
            $table->integer('points');
            $table->string('ip_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_logs');
    }
}
