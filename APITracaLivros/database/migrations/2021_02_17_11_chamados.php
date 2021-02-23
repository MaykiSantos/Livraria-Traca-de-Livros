<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chamados extends Migration
{

    public function up()
    {
        Schema::create('chamados', function(Blueprint $table){
            $table->id();
            $table->string('chamado_titulo', 100);
            $table->text('chamado_descricao');
            $table->foreignId('fk_clientes_id')->constrained('clientes');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('chamados');
    }
}
