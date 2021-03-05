<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{

    public function up()
    {
        Schema::create('produtos', function(Blueprint $table){
            $table->id();
            $table->string('produto_titulo');
            $table->enum('produto_tipo', ['Livro', 'Papelaria']);
            $table->integer('produto_porcentagem_desconto');
            $table->float('produto_valor', 6,2);
            $table->text('produto_descricao');
            $table->float('produto_largura', 3, 1);
            $table->float('produto_altura', 3, 1);
            $table->float('produto_peso', 5, 1);
            $table->year('produto_ano');
            $table->boolean('disponibilidade')->default(false);
            $table->enum('produto_tipo_acabamento', ['Brochura', 'Capa dura', 'Flexível', 'Espiral'])->nullable();
            $table->enum('produto_idioma', ['Português', 'Espanhol', 'Inglês', 'Português(Portugal)'])->nullable();
            $table->float('produto_profundidade', 3, 1)->nullable();
            $table->string('produto_autor', 100)->nullable();
            $table->string('produto_editora', 100)->nullable();
            $table->foreignId('fk_categorias_livros_id')->nullable()->constrained('categorias_livros');
            $table->foreignId('fk_categorias_papelaria_id')->nullable()->constrained('categorias_papelaria');
            $table->foreignId('fk_fornecedores_id')->constrained('fornecedores');
            $table->foreignId('fk_funcionarios_administrativo_id')->constrained('funcionarios_administrativo');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('produtos');
    }
}
