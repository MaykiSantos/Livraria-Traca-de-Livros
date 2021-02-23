<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Localizacao extends Migration
{

    public function up()
    {
        Schema::create('localizacao', function (Blueprint $table){
            $table->id();
            $table->char('localizacao_corredor', 1);
            $table->integer('localizacao_estante');
            $table->integer('localizacao_nivel');
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::drop('localizacao');
    }
}
