<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActorFilm extends Migration
{

    public function up()
    {
        Schema::create('actor_film', function (Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('film_id');

            $table->timestamps();

            $table->foreign('actor_id')
                ->references('id')
                ->on('actors')
                ->onDelete('cascade');

            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('actor_film');
    }
}
