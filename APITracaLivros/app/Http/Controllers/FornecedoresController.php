<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedoresController extends Controller
{

    public function index(){
        $fornecedores = Fornecedor::all();
        return response()->json($fornecedores, 200);
    }

    public function show(string $cnpj)
    {
        $fornecedor = Fornecedor::query()->where('fornecedor_CNPJ', '=', "$cnpj")->get();

        if(sizeof($fornecedor) == null){
            return response()->json('Recurso não encontrado', 404);
        }
        return response()->json($fornecedor);
    }

    public function store(Request $request){

        $this->validaFornecedor($request);

        DB::beginTransaction();
        $fornecedor = Fornecedor::create([
            'fornecedor_CNPJ' => "$request->CNPJ",
            'fornecedor_nome' => "$request->nome",
            'fornecedor_email' => "$request->email",
            'fornecedor_telefone_1' => "$request->telefone_1",
            'fornecedor_telefone_2' => "$request->telefone_2",
            'fornecedor_cep' => "$request->cep",
            'fornecedor_cidade' => "$request->cidade",
            'fornecedor_bairro' => "$request->bairro",
            'fornecedor_rua' => "$request->rua",
            'fornecedor_numero' => "$request->numero"
        ]);
        DB::commit();

        return response()->json($fornecedor, 200);
    }

    public function update(string $cnpj, Request $request)
    {
        $this->validaFornecedor($request);

        DB::beginTransaction();
        $fornecedorEditado = Fornecedor::query()->where('fornecedor_CNPJ', '=', "$cnpj")->update([
            'fornecedor_CNPJ' => "$request->CNPJ",
            'fornecedor_nome' => "$request->nome",
            'fornecedor_email' => "$request->email",
            'fornecedor_telefone_1' => "$request->telefone_1",
            'fornecedor_telefone_2' => "$request->telefone_2",
            'fornecedor_cep' => "$request->cep",
            'fornecedor_cidade' => "$request->cidade",
            'fornecedor_bairro' => "$request->bairro",
            'fornecedor_rua' => "$request->rua",
            'fornecedor_numero' => "$request->numero"
        ]);
        DB::commit();

        if ($fornecedorEditado == false)
        {
            return response()->json('Solicitacao invalida', 404);
        }

        return response()->json(boolval($fornecedorEditado)); // retorna true se a alteração for realizada
    }

    public function destroy(string $cnpj)
    {
        $fornecedorApagar = Fornecedor::query()->where('fornecedor_CNPJ', '=', "$cnpj")->first();

        if($fornecedorApagar == false)
        {
            return response()->json('fornecedor nao encontado', 404);
        }
        return response()->json($fornecedorApagar->delete()); // retorna true se a alteração for realizada
    }


    private function validaFornecedor(Request $request)
    {
        $this->validate($request, [
            'CNPJ'=> 'required|alpha_num|size:14',
            'nome' => 'required',
            'email' => 'required|email:rfc',
            'telefone_1' => 'required|alpha_num',
            'telefone_2' => 'alpha_num|nullable',
            'cep' => 'required|alpha_num|size:8',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero' => 'required',
        ], Erros::mensagens());
    }


}
