<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosSeparacao extends Migration
{

    public function up()
    {
        Schema::create('pedidos_separacao', function(Blueprint $table){
            $table->id();
            $table->foreignId('fk_funcionarios_almoxarifado_id')->constrained('funcionarios_almoxarifado');
            $table->foreignId('fk_pedidos_compras_id')->constrained('pedidos_compras');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('pedidos_separacao');
    }
}
