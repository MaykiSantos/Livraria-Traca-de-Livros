<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table){
           $table->id();
           $table->string('cliente_cpf', 12)->unique();
           $table->string('cliente_nome', 50);
           $table->string('cliente_telefone_01', 12);
           $table->string('cliente_telefone_02', 12)->nullable();
           $table->date('cliente_data_nascimento');
           $table->string('cliente_email', 60)->unique();
           $table->string('cliente_senha');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('clientes');
    }
}
