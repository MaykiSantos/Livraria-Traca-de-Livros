<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LivrosDestaques extends Migration
{

    public function up()
    {
        Schema::create('livros_destaques', function(Blueprint $table){
            $table->id();
            $table->foreignId('fk_produtos_id')->constrained('produtos');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('livros_destaques');
    }
}
