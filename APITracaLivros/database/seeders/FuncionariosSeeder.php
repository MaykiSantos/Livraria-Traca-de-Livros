<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class funcionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios_administrativo')->insert([
            'administrativo_cpf' => '07607197486',
            'administrativo_nome' => 'Kauê Fábio Figueiredo',
            'administrativo_senha' => '123456'
        ]);

        DB::table('funcionarios_almoxarifado')->insert([
            'funcionario_cpf' => '75149847801',
            'funcionario_nome' => 'Bryan Lucca da Rosa',
            'funcionario_senha' => '123456789'
        ]);

        DB::table('funcionarios_almoxarifado')->insert([
            'funcionario_cpf' => '17270322171',
            'funcionario_nome' => 'Manuel Geraldo Caldeira',
            'funcionario_senha' => '1234'
        ]);
    }
}
