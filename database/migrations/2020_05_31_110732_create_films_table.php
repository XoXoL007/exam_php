<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('title')->unique();
            $table->text('decryption')->nullable();

            $table->text('cover_url')->nullable();
            $table->text('trailer_url')->nullable();
            $table->text('film_url')->nullable();

            $table->smallInteger('quality_id')->default(0);
            $table->smallInteger('release_year_id')->default(0);




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
        Schema::dropIfExists('films');
    }
}
