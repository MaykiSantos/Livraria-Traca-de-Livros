<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'cliente_cpf' => '05560891541',
            'cliente_nome' => 'mayki dos santos oliveira',
            'cliente_telefone_01' => '73 999511328',
            'cliente_telefone_02' => '73 933000763',
            'cliente_data_nascimento' => '1997-08-04',
            'cliente_email' => 'testecliente@gmail.com',
            'cliente_senha' => md5('123456789')
        ]);

        DB::table('clientes')->insert([
            'cliente_cpf' => '14524874568',
            'cliente_nome' => 'andre santana da silva',
            'cliente_telefone_01' => '73 999511328',
            'cliente_telefone_02' => '73 933000763',
            'cliente_data_nascimento' => '1993-04-25',
            'cliente_email' => 'testecliente02@gmail.com',
            'cliente_senha' => md5('987654321')
        ]);
    }
}
