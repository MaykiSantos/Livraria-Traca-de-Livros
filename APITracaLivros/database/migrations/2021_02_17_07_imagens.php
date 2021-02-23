<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagens extends Migration
{

    public function up()
    {
        Schema::create('imagens', function(Blueprint $table){
            $table->id();
            $table->binary('imagem_1');
            $table->binary('imagem_2')->nullable();
            $table->binary('imagem_3')->nullable();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('imagens');
    }
}
