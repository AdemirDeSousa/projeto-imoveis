<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteressesTable extends Migration
{
    public function up()
    {
        Schema::create('interesses', function (Blueprint $table) {

            $table->unsignedBigInteger('imoveis_id');
            $table->unsignedBigInteger('interessados_id');

            $table->foreign('imoveis_id')->references('id')->on('imoveis');
            $table->foreign('interessados_id')->references('id')->on('interessados');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interesses');
    }
}
