<?php


namespace App\Http\Controllers;


use App\Models\Produto;

class ProdutosLivrosController extends Controller
{
    public function showFull(int $idCategoria)
    {
        $livrosCategoria = Produto::query()
            ->join('categorias_livros', 'produtos.fk_categorias_livros_id', '=', 'categorias_livros.id')
            ->join('fornecedores', 'produtos.fk_fornecedores_id', '=', 'fornecedores.id')
            ->join('funcionarios_administrativo', 'produtos.fk_funcionarios_administrativo_id', '=', 'funcionarios_administrativo.id')
            ->where('produto_tipo', '=', 'Livro')
            ->where('fk_categorias_livros_id', '=', "$idCategoria")
            ->select(['produtos.id', 'produto_titulo', 'produto_porcentagem_desconto', 'produto_valor', 'produto_descricao', 'produto_largura', 'produto_altura', 'produto_peso', 'produto_ano', 'produto_tipo_acabamento', 'produto_idioma', 'produto_profundidade', 'produto_autor', 'produto_editora', 'categoria_descricao', 'categorias_livros.id as id_categoria', 'fornecedor_cnpj', 'administrativo_cpf', 'disponibilidade'])
            ->get();

        return response()->json($livrosCategoria);
    }

    public function show(int $idCategoria)
    {
        $livrosCategoria = Produto::query()
            ->join('fornecedores', 'produtos.fk_fornecedores_id', '=', 'fornecedores.id')
            ->join('funcionarios_administrativo', 'produtos.fk_funcionarios_administrativo_id', '=', 'funcionarios_administrativo.id')
            ->where('produto_tipo', '=', 'Livro')
            ->where('fk_categorias_livros_id', '=', "$idCategoria")
            ->select(['produtos.id', 'produto_tipo', 'produto_titulo', 'produto_porcentagem_desconto', 'produto_valor', 'produto_autor', 'produto_editora', 'fk_categorias_livros_id as id_categoria', 'fornecedor_cnpj', 'administrativo_cpf', 'disponibilidade'])
            ->get();

        return response()->json($livrosCategoria);
    }

}
