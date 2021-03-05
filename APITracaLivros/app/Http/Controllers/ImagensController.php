<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class ImagensController extends Controller
{
    public function show(int $idImagem)
    {
        $imagens = Imagem::query()->where('id', '=', "$idImagem")->get();

        if(sizeof($imagens) == false){
            return Erros::naoEncontado();
        }

        return response($imagens[0]->imagem, 200)->header('Content-type', 'image/jpeg');
    }

    public function store(Request $request)
    {
        //valida tipo da requisição
        if (!preg_match('/multipart\/form-data;/', $request->header('Content-Type'))){
            return Erros::tipoInvalido();
        }

        //verifica existencia da chave 'imagem'
        if (!$request->hasFile('imagem')) {
            return Erros::naoEspecificado();
        }

        //verifica se o arquivio enviado está corrompido
        if (!$request->file('imagem')->isValid()) {
            return Erros::erroArquivo();
        }

        //salva imagem no banco
        DB::beginTransaction();
        $resultado = DB::insert("insert into imagens (imagem, fk_produtos_id) values (?, ?)", [$request->imagem->get(), $request->produto_id]);
        DB::commit();

        return response()->json($resultado);
    }

    public function destroy($idImagem)
    {
        $imagemDelete = Imagem::query()->where('id', '=', "$idImagem")->first();
        if($imagemDelete == false){
            return Erros::naoEncontado();
        }

        return response()->json($imagemDelete->delete());
    }
}
