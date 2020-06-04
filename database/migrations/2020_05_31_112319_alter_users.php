<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsers extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table){

            $table->unsignedBigInteger('role_id')->default(1);

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('role_id');
        });
    }
}
