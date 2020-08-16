<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{

    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('codigo');
            $table->string('tipo');
            $table->string('pretensão');
            $table->string('titulo');
            $table->string('detalhes');
            $table->integer('quartos');
            $table->float('preco', 10, 2);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
