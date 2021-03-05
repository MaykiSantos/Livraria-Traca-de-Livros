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
            $table->binary('imagem');
            $table->foreignId('fk_produtos_id')->constrained('produtos');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('imagens');
    }
}
