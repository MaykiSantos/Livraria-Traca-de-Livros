<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aplicacoes extends Migration
{

    public function up()
    {
        Schema::create('aplicacoes', function (Blueprint $table){
           $table->id();
           $table->string('aplicacao_nome');
           $table->string('aplicacao_chave')->unique();
           $table->string('aplicacao_token')->unique();
           $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('aplicacoes');
    }
}
