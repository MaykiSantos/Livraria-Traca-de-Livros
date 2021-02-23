<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestaques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destaques', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->mediumText('descricao');
            $table->integer('largura');
            $table->integer('peso');
            $table->float('valor', 5, 2);
            $table->float('desconto')->default(0);
            $table->enum('acabamento', ['Brochura', 'Capa dura', 'Flexível', 'Espiral'])->nullable();
            $table->enum('idioma', ['Português', 'Espanhol', 'Ingles', 'Frances'])->nullable();
            $table->string('autor', 100)->nullable();
            $table->string('editora', 100)->nullable();
            $table->binary('imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destaques');
    }
}
