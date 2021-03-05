<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\CategoriaLivro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasLivroController extends Controller
{
    public function index()
    {
        $categoriasLivros = CategoriaLivro::all();
        return response()->json($categoriasLivros, 200);
    }

    public function store(Request $request)
    {
        $this->validaCategoria($request);

        DB::beginTransaction();
        $categoria = CategoriaLivro::create([
            'categoria_descricao' => "$request->categoria"
        ]);
        DB::commit();

        return response()->json($categoria, 200);
    }

    public function update(Request $request, int $idCategoria)
    {
        $this->validaCategoria($request);

        DB::beginTransaction();
        $categoriaEditada = CategoriaLivro::query()->where('id', '=', "$idCategoria")->update([
            'categoria_descricao' => "$request->categoria"
        ]);
        DB::commit();

        if ($categoriaEditada == false){
            return Erros::naoEncontado();
        }
        return response()->json(boolval($categoriaEditada), 200);
    }

    public function destroy(int $idCategoria)
    {
        DB::beginTransaction();
        $categoriaDelete = CategoriaLivro::query()->where('id', '=', "$idCategoria")->first();

        if ($categoriaDelete == false){
            return Erros::naoEncontado();
        }
        $categoriaDelete->delete();
        DB::commit();

        return response()->json(boolval($categoriaDelete), 200);
    }

    private function validaCategoria(Request $request)
    {
        $this->validate($request, [
            'categoria' => 'required'
        ], Erros::mensagens());
    }
}
