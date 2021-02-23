<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuncionariosAdministrativo extends Migration
{

    public function up()
    {
        Schema::create('funcionarios_administrativo', function(Blueprint $table){
            $table->id();
            $table->string('administrativo_cpf', 11)->unique();
            $table->string('administrativo_nome', 50);
            $table->string('administrativo_senha');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('funcionarios_administrativo');
    }
}
