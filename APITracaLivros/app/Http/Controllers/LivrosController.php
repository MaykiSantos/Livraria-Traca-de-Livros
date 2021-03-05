<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Produto;

class LivrosController extends Controller
{

    public function show(int $idLivro, int $idCategoria)
    {
        $livro = Produto::query()
            ->join('categorias_livros', 'produtos.fk_categorias_livros_id', '=', 'categorias_livros.id')
            ->join('fornecedores', 'produtos.fk_fornecedores_id', '=', 'fornecedores.id')
            ->join('funcionarios_administrativo', 'produtos.fk_funcionarios_administrativo_id', '=', 'funcionarios_administrativo.id')
            ->where('produto_tipo', '=', 'Livro')
            ->where('categorias_livros.id', '=', "$idCategoria")
            ->where('produtos.id', '=', "$idLivro")
            ->select(['produtos.id', 'produto_tipo', 'produto_titulo', 'produto_porcentagem_desconto', 'produto_valor', 'produto_descricao', 'produto_largura', 'produto_altura', 'produto_peso', 'produto_ano', 'produto_tipo_acabamento', 'produto_idioma', 'produto_profundidade', 'produto_autor', 'produto_editora', 'categoria_descricao', 'categorias_livros.id as id_categoria', 'fornecedor_cnpj', 'administrativo_cpf', 'disponibilidade'])
            ->get();

        if (sizeof($livro) == false){
            return Erros::naoEncontado();
        }

        return response()->json($livro, 200);
    }

}
