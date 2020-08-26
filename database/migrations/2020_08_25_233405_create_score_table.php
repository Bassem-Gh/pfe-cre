<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoremv', function (Blueprint $table) {
   
            $table->increments('idscore');
            $table->foreign('unique_id')
            ->references('unique_id')->on('mouvement_mariage')
            ->onDelete('cascade');
             $table->integer('score');
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
        Schema::dropIfExists('scoremv');
    }
}
