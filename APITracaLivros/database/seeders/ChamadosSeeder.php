<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChamadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chamados')->insert([
            'chamado_titulo' => 'chamado teste',
            'chamado_descricao' => 'descricaodescricaodescricaodescricaodescricaodescricaodescricaodescricaodescricaodescricaodescricaodescricao',
            'fk_clientes_id' => '1'
        ]);
    }
}
