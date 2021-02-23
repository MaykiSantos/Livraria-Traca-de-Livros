<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fornecedores extends Migration
{

    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table){
           $table->id();
           $table->string('fornecedor_CNPJ', 14)->unique();
           $table->string('fornecedor_nome');
           $table->string('fornecedor_email', 100)->unique();
           $table->string('fornecedor_telefone_1', 20);
           $table->string('fornecedor_telefone_2', 20)->nullable();
           $table->string('fornecedor_cep', 8);
           $table->string('fornecedor_cidade', 50);
           $table->string('fornecedor_bairro', 50);
           $table->string('fornecedor_rua', 50);
           $table->string('fornecedor_numero', 8);
            $table->softDeletes();


        });
    }


    public function down()
    {
        Schema::drop('fornecedores');
    }
}
