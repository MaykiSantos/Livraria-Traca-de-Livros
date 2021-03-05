<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{

    public function store(Request $request)
    {
        $this->validaProduto($request);

        try{
            DB::beginTransaction();
            $produto = Produto::create([
                'produto_titulo' => "$request->titulo",
                'produto_tipo' => "$request->tipo",
                'produto_porcentagem_desconto' => "$request->porcentagem_desconto",
                'produto_valor' => "$request->valor",
                'produto_descricao' => "$request->descricao",
                'produto_largura' => "$request->largura",
                'produto_altura' => "$request->altura",
                'produto_peso' => "$request->peso",
                'produto_ano' => "$request->ano",
                'produto_tipo_acabamento' => "$request->tipo_acabamento",
                'produto_idioma' => "$request->idioma",
                'produto_profundidade' => "$request->profundidade",
                'produto_autor' => "$request->autor",
                'produto_editora' => "$request->editora",
                'fk_categorias_livros_id' => ($request->categoria_livros_id ? $request->categoria_livros_id : null),
                'fk_categorias_papelaria_id' => ($request->categoria_papelaria_id ? $request->categoria_papelaria_id : null),
                'fk_fornecedores_id' => "$request->fornecedor_id",
                'fk_funcionarios_administrativo_id' => "$request->funcionario_administrativo_id"
            ]);
            DB::commit();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json($produto);
    }

    public function update(Request $request, int $idProduto)
    {
        $this->validaProduto($request);
        try{
            DB::beginTransaction();
            $produtoAtualiza = Produto::query()->where('id', '=', "$idProduto")->update([
                'produto_titulo' => "$request->titulo",
                'produto_tipo' => "$request->tipo",
                'produto_porcentagem_desconto' => "$request->porcentagem_desconto",
                'produto_valor' => "$request->valor",
                'produto_descricao' => "$request->descricao",
                'produto_largura' => "$request->largura",
                'produto_altura' => "$request->altura",
                'produto_peso' => "$request->peso",
                'produto_ano' => "$request->ano",
                'produto_tipo_acabamento' => "$request->tipo_acabamento",
                'produto_idioma' => "$request->idioma",
                'produto_profundidade' => "$request->profundidade",
                'produto_autor' => "$request->autor",
                'produto_editora' => "$request->editora",
                'fk_categorias_livros_id' => ($request->categoria_livros_id ? $request->categoria_livros_id : null),
                'fk_categorias_papelaria_id' => ($request->categoria_papelaria_id ? $request->categoria_papelaria_id : null),
                'fk_fornecedores_id' => "$request->fornecedor_id",
                'fk_funcionarios_administrativo_id' => "$request->funcionario_administrativo_id"
            ]);
            DB::commit();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }


        if ($produtoAtualiza == false){
            return Erros::naoEncontado();
        }
        return response()->json(boolval($produtoAtualiza));
    }

    public function destroy(int $idProduto)
    {
        $produtoDeletar = Produto::query()->where('id', '=', "$idProduto")->first();
        if ($produtoDeletar == false){
            return Erros::naoEncontado();
        }

        return response()->json($produtoDeletar->delete());
    }


    private function validaProduto(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'tipo' => 'required|starts_with:Livro,Papelaria',
            'porcentagem_desconto' => 'required|regex:/^\d{2}$/',
            'valor' => 'required|regex:/^\d{1,4}\.\d\d/',
            'descricao' => 'required',
            'largura' => 'required|regex:/^\d{1,2}\.\d/',
            'altura' => 'required|regex:/^\d{1,2}\.\d/',
            'peso' => 'required|regex:/^\d{1,4}\.\d/',
            'ano' => 'required',
            'tipo_acabamento' => 'nullable|starts_with:Brochura,Capa dura,Flexível,Espiral',
            'idioma' => 'nullable|starts_with:Português,Espanhol,Inglês,Português(Portugal)',
            'profundidade' => 'nullable',
            'autor' => 'nullable',
            'editora' => 'nullable',
            'categoria_livros_id' => 'required_without:categoria_papelaria_id',
            'categoria_papelaria_id' => 'required_without:categoria_livros_id',
            'fornecedor_id' => 'required|numeric',
            'funcionario_administrativo_id' => 'required|numeric'
        ], Erros::mensagens());
    }
}
