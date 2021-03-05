<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            categoriasSeeder::class,
            fornecedorSeeder::class,
            funcionariosSeeder::class,
            produtosSeeder::class,
            ClientesSeeder::class,
            ChamadosSeeder::class
            //imagensSeeder::class
        ]);
    }
}
