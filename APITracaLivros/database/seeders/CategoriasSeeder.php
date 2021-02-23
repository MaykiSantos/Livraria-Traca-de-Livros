<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_livros')->insert(['categoria_descricao'=>'Aventura']);
        DB::table('categorias_livros')->insert(['categoria_descricao'=>'Ação']);
        DB::table('categorias_livros')->insert(['categoria_descricao'=>'Manga']);

        DB::table('categorias_papelaria')->insert(['categoria_descricao'=>'Escritorio']);
        DB::table('categorias_papelaria')->insert(['categoria_descricao'=>'Escola']);
        DB::table('categorias_papelaria')->insert(['categoria_descricao'=>'Pastas']);
    }
}
