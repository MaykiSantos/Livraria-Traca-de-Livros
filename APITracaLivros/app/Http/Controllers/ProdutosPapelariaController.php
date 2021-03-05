<?php


namespace App\Http\Controllers;


use App\Models\Produto;

class ProdutosPapelariaController extends Controller
{
    public function show(int $idCategoria)
    {
        $papelariaCategoria = Produto::query()
            ->join('fornecedores', 'produtos.fk_fornecedores_id', '=', 'fornecedores.id')
            ->join('funcionarios_administrativo', 'produtos.fk_funcionarios_administrativo_id', '=', 'funcionarios_administrativo.id')
            ->where('produto_tipo', '=', 'Papelaria')
            ->where('fk_categorias_papelaria_id', '=', "$idCategoria")
            ->select(['produtos.id', 'produto_tipo', 'produto_titulo', 'produto_porcentagem_desconto', 'produto_valor', 'fk_categorias_papelaria_id as id_categoria', 'fornecedor_cnpj', 'administrativo_cpf', 'disponibilidade'])
            ->get();

        return response()->json($papelariaCategoria);
    }

}
