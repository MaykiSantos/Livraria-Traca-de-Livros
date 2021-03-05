<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produtosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'produto_titulo' => 'A Arte da Sabedoria',
            'produto_tipo' => 'Livro',
            'produto_porcentagem_desconto' => '00',
            'produto_valor' => '13.90',
            'produto_descricao' => 'Edição completa com os Oráculos inspiradores escritos há mais de 300 anos. Grandes sábios e ilustres líderes buscaram conhecimento na obra mais clássica de Baltasar Gracián. Escritos há mais de 300 anos, os aforismas criados pelo autor permanecem atuais e são imprescindíveis para alcançar, em qualquer aspecto da vida, o sucesso. Absolutamente único... um livro feito para uso constante - um companheiro para a vida. ” Arthur Schopenhauer Faça que lhe vejam como sensato, em vez de intrometido. Busque alguém que o ajude a carregar suas tristezas e compartilhe as suas felicidades. Não queira o que todos querem, seja feliz com o que tem.',
            'produto_largura' => '23.0',
            'produto_altura' => '16.0',
            'produto_peso' => '322.6',
            'produto_ano' => '2018',
            'produto_tipo_acabamento' => 'Capa dura',
            'produto_idioma' => 'Português',
            'produto_profundidade' => '5',
            'produto_autor' => 'Gracián, Baltasar',
            'produto_editora' => 'Faro Editorial',
            'fk_categorias_livros_id' => '1',
            'fk_categorias_papelaria_id' => null,
            'fk_fornecedores_id' => '1',
            'fk_funcionarios_administrativo_id' => '1',
        ]);

        DB::table('produtos')->insert([
            'produto_titulo' => 'O Hobbit A Batalha Dos Cinco Exércitos',
            'produto_tipo' => 'Livro',
            'produto_porcentagem_desconto' => '00',
            'produto_valor' => '130.55',
            'produto_descricao' => 'Tolkien, a batalha dos Cinco Exércitos foi uma guerra travada na Terceira Era entre Homens do lago, Anões das regiões das colinas de ferro, Elfos da floresta, Goblins e Wargs. Esta batalha aconteceu no limites de Erebor, a Montanha Solitária, a então habitação abandonada dos anões antes do ataque do dragão Smaug.',
            'produto_largura' => '8.5',
            'produto_altura' => '25.4',
            'produto_peso' => '66.5',
            'produto_ano' => '2017',
            'produto_tipo_acabamento' => 'Capa dura',
            'produto_idioma' => 'Português',
            'produto_profundidade' => '16.0',
            'produto_autor' => 'Fisher, Jude',
            'produto_editora' => 'Wmf Martins Fontes',
            'fk_categorias_livros_id' => '1',
            'fk_categorias_papelaria_id' => null,
            'fk_fornecedores_id' => '2',
            'fk_funcionarios_administrativo_id' => '1',
        ]);

        DB::table('produtos')->insert([
            'produto_titulo' => 'Box - Nórdicos - Os Melhores Contos e Lendas - 2 Volumes',
            'produto_tipo' => 'Livro',
            'produto_porcentagem_desconto' => '00',
            'produto_valor' => '134.25',
            'produto_descricao' => 'O Box Nórdicos reúne histórias encantadoras dos povos antigos que habitaram o norte da Europa, região que, atualmente, é composta pelos países Dinamarca, Finlândia, Islândia, Noruega e Suécia. Nele, o leitor conhecerá os melhores contos de fadas, lendas, sagas e mitos nórdicos. São histórias cheias de simbologia, cujos personagens são venerados como deuses, semideuses e heróis, e que vão proporcionar uma experiência muito agradável, seja para crianças, jovens ou adultos. Primeiro volume – Contos e lendas A primeira parte traz contos de fadas mágicos e histórias extraordinárias de autores como Hans Christian Andersen, J. Jakobsen, Peter Christen Asbjørnsen e Jørgen Moe, que falam sobre valores como bravura, coragem, humildade e perseverança. Em suas narrativas a bondade é sempre recompensada. A segunda parte introduz o leitor em um mundo de aventura povoado por criaturas místicas como trolls, anões, orcs, elfos e gigantes. Segundo volume – Mitos e sagas Na primeira parte desse volume, dedicada aos mitos, reunimos contos que abordam desde a criação da humanidade, o nascimento, os feitos e as personalidades de deuses como Odin, Thor e Loki, até a grande batalha de Ragnarók, que tudo destruirá para que o mundo renasça. Das Eddas de Snorri Sturluson selecionamos algumas histórias que foram traduzidas em uma linguagem simples e acessível para o público moderno.',
            'produto_largura' => '6.9',
            'produto_altura' => '12.4',
            'produto_peso' => '65.4',
            'produto_ano' => '2020',
            'produto_tipo_acabamento' => 'Capa dura',
            'produto_idioma' => 'Português',
            'produto_profundidade' => '32.5',
            'produto_autor' => 'Vários',
            'produto_editora' => 'Pandorga',
            'fk_categorias_livros_id' => '2',
            'fk_categorias_papelaria_id' => null,
            'fk_fornecedores_id' => '2',
            'fk_funcionarios_administrativo_id' => '1',
        ]);
    }
}
