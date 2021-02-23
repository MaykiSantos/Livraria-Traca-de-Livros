<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estoques extends Migration
{

    public function up()
    {
        Schema::create('estoques', function (Blueprint $table){
            $table->id();
            $table->integer('estoque_quantidade');
            $table->integer('estoque_quantidade-minima');
            $table->foreignId('fk_localizacao_id')->constrained('localizacao');
            $table->foreignId('fk_produtos_id')->constrained('produtos');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('estoques');
    }
}
