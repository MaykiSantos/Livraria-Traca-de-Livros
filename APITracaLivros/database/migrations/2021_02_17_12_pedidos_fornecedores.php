<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosFornecedores extends Migration
{

    public function up()
    {
        Schema::create('pedidos_fornecedores', function(Blueprint $table){
            $table->id();
            $table->mediumText('pedidos_fornecedor_descricao');
            $table->date('pedidos_fornecedor_data');
            $table->date('pedidos_fornecedor_data_entrega')->nullable();
            $table->text('pedidos_fornecedor_observacoes')->nullable();
            $table->foreignId('fk_funcionarios_administrativo_id')->constrained('funcionarios_administrativo');
            $table->foreignId('fk_fornecedores_id')->constrained('fornecedores');
            $table->softDeletes();

        });
    }


    public function down()
    {
        Schema::drop('pedidos_fornecedores');
    }
}
