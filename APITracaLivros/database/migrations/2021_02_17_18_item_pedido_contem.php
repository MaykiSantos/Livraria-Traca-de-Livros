<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemPedidoContem extends Migration
{

    public function up()
    {
        Schema::create('item_pedido_contem', function(Blueprint $table){
            $table->id();
            $table->float('item_pedido_valor', 5, 2);
            $table->integer('item_pedido_quantidade');
            $table->foreignId('fk_pedidos_compras_id')->constrained('pedidos_compras');
            $table->foreignId('fk_produtos_id')->constrained('produtos');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('item_pedido_contem');
    }
}
