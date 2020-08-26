<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosteetabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posteetab', function (Blueprint $table) {
            $table->id();
            $table->integer('idetab')->unsigned();
            $table->foreign('idetab')
            ->references('codeetab')->on('etab')
            ->onDelete('cascade');
            $table->integer('codemat')->unsigned();
            $table->foreign('codemat')
            ->references('codemat')->on('matiere')
            ->onDelete('cascade');

            $table->integer('nbrpost');
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
        Schema::dropIfExists('posteetab');
    }
}
