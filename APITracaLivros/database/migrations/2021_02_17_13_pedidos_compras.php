<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosCompras extends Migration
{

    public function up()
    {
        Schema::create('pedidos_compras', function(Blueprint $table){
            $table->id();
            $table->date('pedido_data');
            $table->float('pedido_valor', 6, 2);
            $table->foreignId('fk_clientes_id')->constrained('clientes');
            $table->foreignId('fk_status_pedidos_id')->constrained('status_pedidos');
            $table->foreignId('fk_enderecos_id')->constrained('enderecos');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('pedidos_compras');
    }
}
