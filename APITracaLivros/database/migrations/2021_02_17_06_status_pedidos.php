<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPedidos extends Migration
{

    public function up()
    {
        Schema::create('status_pedidos', function (Blueprint $table){
            $table->id();
            $table->string('status_descricao', 30);
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('status_pedidos');
    }
}
