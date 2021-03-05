<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/teste', function () use ($router) {
    $imagens = \App\Models\Imagem::query()->where('id', '=', '4')->get();
    $lista = [$imagens[0]->imagem_1, $imagens[0]->imagem_2];
    return response($imagens[0]->imagem_2)->header('Content-Type', 'image/png');

});


$router->group(['prefix' => env('PREFIX_API')], function() use ($router){
    $router->get('fornecedores', 'FornecedoresController@index');
    $router->post('fornecedores', 'FornecedoresController@store');
    $router->get('fornecedores/{cnpj}', 'FornecedoresController@show');
    $router->put('fornecedores/{cnpj}', 'FornecedoresController@update');
    $router->delete('fornecedores/{cnpj}', 'FornecedoresController@destroy');

    $router->get('funcionarios-administrativo', 'FuncionariosAdministrativoController@index');
    $router->post('funcionarios-administrativo', 'FuncionariosAdministrativoController@store');
    $router->get('funcionarios-administrativo/{cpf}', 'FuncionariosAdministrativoController@show');
    $router->put('funcionarios-administrativo/{cpf}', 'FuncionariosAdministrativoController@update');
    $router->delete('funcionarios-administrativo/{cpf}', 'FuncionariosAdministrativoController@destroy');

    $router->get('funcionarios-almoxarifado', 'FuncionarioAlmoxarifadoController@index');
    $router->post('funcionarios-almoxarifado', 'FuncionarioAlmoxarifadoController@store');
    $router->get('funcionarios-almoxarifado/{cpf}', 'FuncionarioAlmoxarifadoController@show');
    $router->put('funcionarios-almoxarifado/{cpf}', 'FuncionarioAlmoxarifadoController@update');
    $router->delete('funcionarios-almoxarifado/{cpf}', 'FuncionarioAlmoxarifadoController@destroy');

    $router->get('categorias-livros', 'CategoriasLivroController@index');
    $router->post('categorias-livros', 'CategoriasLivroController@store');
    $router->put('categorias-livros/{idCategoria}', 'CategoriasLivroController@update');
    $router->delete('categorias-livros/{idCategoria}', 'CategoriasLivroController@destroy');

    $router->get('categorias-papelaria', 'CategoriasPapelariaController@index');
    $router->post('categorias-papelaria', 'CategoriasPapelariaController@store');
    $router->put('categorias-papelaria/{idCategoria}', 'CategoriasPapelariaController@update');
    $router->delete('categorias-papelaria/{idCategoria}', 'CategoriasPapelariaController@destroy');

    $router->get('imagens/{idImagem}', 'ImagensController@show');
    $router->delete('imagens/{idImagem}', 'ImagensController@destroy');
    $router->post('imagens', 'ImagensController@store');

    $router->get('produtos-livro/full/cat{idCategoria}', 'ProdutosLivrosController@showFull');
    $router->get('produtos-livro/cat{idCategoria}', 'ProdutosLivrosController@show');
    $router->get('produtos-livro/cat{idCategoria}/livro/{idLivro}', 'LivrosController@show');
    $router->get('produtos-papelaria/cat{idCategoria}', 'ProdutosPapelariaController@show');
    $router->get('produtos-papelaria/cat{idCategoria}/papelaria/{idPapelaria}', 'PapelariaController@show');
    $router->post('produtos', 'ProdutoController@store');
    $router->put('produtos/{idProduto}', 'ProdutoController@update');
    $router->delete('produtos/{idProduto}', 'ProdutoController@destroy');

    $router->get('clientes', 'ClienteController@index');
    $router->get('clientes/{cpfCliente}', 'ClienteController@show');
    $router->put('clientes/{cpfCliente}', 'ClienteController@update');
    $router->post('clientes', 'ClienteController@store');

    //$router->post('chamados', 'ChamadosController@store'); //Criar chamados, tabela de chamados incompleta
    $router->get('chamados', 'ChamadosController@index');
    $router->get('chamados/{idChamado}', 'ChamadosController@show');
    $router->delete('chamados/{idChamado}', 'ChamadosController@destroy');
    $router->get('chamados/clientes/{cpfCliente}', 'ChamadosController@showChamadoCliente');

    $router->get('enderecos', 'EnderecosController@index');

});
