<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     // title と body と image_path を追記
    public function up()
    {
        Schema::create('pokers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('myhand1'); 
            $table->string('myhand2');
            $table->string('board1');
            $table->string('board2');
            $table->string('board3');
            $table->string('board4');
            $table->string('board5');
            $table->string('body'); 
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
        Schema::dropIfExists('pokers');
    }
}
