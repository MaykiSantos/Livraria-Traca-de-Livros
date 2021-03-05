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
            return Erros::naoEncontado();
        }
        return response()->json($fornecedor);
    }

    public function store(Request $request){

        $this->validate($request, [
            'CNPJ'=> 'unique:App\Models\Fornecedor,fornecedor_CNPJ',
            'email' => 'unique:App\Models\Fornecedor,fornecedor_email'
        ], Erros::mensagens());
        $this->validaFornecedor($request);

        try{
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
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json($fornecedor, 200);
    }

    public function update(string $cnpj, Request $request)
    {
        $this->validaFornecedor($request);

        try {
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
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        if ($fornecedorEditado == false)
        {
            return Erros::naoEncontado();
        }

        return response()->json(boolval($fornecedorEditado)); // retorna true se a alteração for realizada
    }

    public function destroy(string $cnpj)
    {

        try {
            $fornecedorApagar = Fornecedor::query()->where('fornecedor_CNPJ', '=', "$cnpj")->first();
            if($fornecedorApagar == false)
            {
                return Erros::naoEncontado();
            }
            $fornecedorApagar->delete();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json(boolval($fornecedorApagar)); // retorna true se a alteração for realizada
    }


    private function validaFornecedor(Request $request)
    {
        $this->validate($request, [
            'CNPJ'=> 'required|regex:/\d{14}/|size:14',
            'nome' => 'required',
            'email' => 'required|email:rfc',
            'telefone_1' => 'required|integer',
            'telefone_2' => 'nullable',
            'cep' => 'required|regex:/\d{8}/|size:8',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero' => 'required',
        ], Erros::mensagens());
    }


}
