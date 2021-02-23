<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasLivros extends Migration
{

    public function up()
    {
        Schema::create('categorias_livros', function(Blueprint $table){
           $table->id();
           $table->string('categoria_descricao', 40);
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('categorias_livros');
    }
}
