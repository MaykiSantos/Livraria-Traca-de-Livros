<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fornecedores')->insert([
            'fornecedor_CNPJ'=>'05191056000194',
            'fornecedor_nome'=>'Erick desenhar Ltda',
            'fornecedor_email'=>'estoque@erickelorenzoeletronicaltda.com.br',
            'fornecedor_telefone_1'=>'1126363182',
            'fornecedor_telefone_2'=>'11999708913',
            'fornecedor_cep'=>'05182420',
            'fornecedor_cidade'=>'São Paulo',
            'fornecedor_bairro'=>"Cidade D'Abril",
            'fornecedor_rua'=>'Rua Inácio Castelli',
            'fornecedor_numero'=>'291'
        ]);

        DB::table('fornecedores')->insert([
            'fornecedor_CNPJ'=>'61238429000106',
            'fornecedor_nome'=>'Malu e Bryan Editora ME',
            'fornecedor_email'=>'producao@maluebryanpublicidadeepropagandame.com.br',
            'fornecedor_telefone_1'=>'1125748701',
            'fornecedor_telefone_2'=>'',
            'fornecedor_cep'=>'05712060',
            'fornecedor_cidade'=>'São Paulo',
            'fornecedor_bairro'=>'Jardim Parque Morumbi',
            'fornecedor_rua'=>'Rua General Adriano Saldanha Mazza',
            'fornecedor_numero'=>'382'
        ]);
    }
}
