<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enderecos extends Migration
{

    public function up()
    {
        Schema::create('enderecos', function(Blueprint $table){
            $table->id();
            $table->string('cep', 8);
            $table->string('cidade', 50);
            $table->string('bairro', 50);
            $table->string('rua', 50);
            $table->string('numero', 8);
            $table->foreignId('fk_clientes_id')->constrained('clientes');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('enderecos');
    }
}
