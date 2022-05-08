<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->integer('staff_id')->unsigned()->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('organization')->nullable();
            $table->integer('players')->nullable();
            $table->text('country')->nullable();
            $table->text('name')->nullable();
            $table->integer('validated')->nullable()->default(0);
            $table->integer('finished')->nullable()->default(0);
            $table->text('player_names')->nullable();
            $table->datetime('date')->nullable();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('users');
            $table->foreign('staff_id')->references('id')->on('personals')->onDelete('cascade');

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
        Schema::dropIfExists('reserves');
    }
};
