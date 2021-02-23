<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuncionariosAlmoxarifado extends Migration
{

    public function up()
    {
        Schema::create('funcionarios_almoxarifado', function(Blueprint $table){
            $table->id();
            $table->string('funcionario_cpf', 11)->unique();
            $table->string('funcionario_nome', 50);
            $table->string('funcionario_senha');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('funcionarios_almoxarifado');
    }
}
