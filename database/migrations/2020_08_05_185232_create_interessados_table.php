<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteressadosTable extends Migration
{

    public function up()
    {
        Schema::create('interessados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nome');
            $table->string('email')->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interessados');
    }
}
