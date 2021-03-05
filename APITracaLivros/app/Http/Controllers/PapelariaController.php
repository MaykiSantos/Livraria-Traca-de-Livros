<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Produto;

class PapelariaController extends Controller
{

    public function show(int $idPapelaria, int $idCategoria)
    {
        $papelaria = Produto::query()
            ->join('categorias_papelaria', 'produtos.fk_categorias_papelaria_id', '=', 'categorias_papelaria.id')
            ->join('fornecedores', 'produtos.fk_fornecedores_id', '=', 'fornecedores.id')
            ->join('funcionarios_administrativo', 'produtos.fk_funcionarios_administrativo_id', '=', 'funcionarios_administrativo.id')
            ->where('produto_tipo', '=', 'Papelaria')
            ->where('categorias_papelaria.id', '=', "$idCategoria")
            ->where('produtos.id', '=', "$idPapelaria")
            ->select(['produtos.id', 'produto_tipo', 'produto_titulo', 'produto_porcentagem_desconto', 'produto_valor', 'produto_descricao', 'produto_largura', 'produto_altura', 'produto_peso', 'categoria_descricao', 'categorias_papelaria.id as id_categoria', 'fornecedor_cnpj', 'administrativo_cpf', 'disponibilidade'])
            ->get();

        if (sizeof($papelaria) == false){
            return Erros::naoEncontado();
        }

        return response()->json($papelaria, 200);
    }
}
