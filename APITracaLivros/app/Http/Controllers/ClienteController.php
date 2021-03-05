<?php


namespace App\Http\Controllers;


use App\Http\Help\ConverteData;
use App\Http\Help\Erros;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'required|size:11|regex:/\d{11}/',
            'email' => 'required',
            'senha' => 'required'
        ], Erros::mensagens());
        $this->validaCliente($request);

        try{
            DB::beginTransaction();
            $cliente = Cliente::create([
                'cliente_cpf' => "$request->cpf",
                'cliente_nome' => "$request->nome",
                'cliente_telefone_01' => "$request->telefone_01",
                'cliente_telefone_02' => "$request->telefone_02",
                'cliente_data_nascimento' => ConverteData::formataData($request->data_nascimento),
                'cliente_email' => "$request->email",
                'cliente_senha' => md5($request->senha)
            ]);
            DB::commit();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json($cliente);
    }

    public function show(string $cpfCliente)
    {
        $cliente = Cliente::query()->where('cliente_cpf', '=', "$cpfCliente")->get();

        if (sizeof($cliente) == false){
            return Erros::naoEncontado();
        }

        return response()->json($cliente);
    }

    public function update(Request $request, string $cpfCliente)
    {
        $this->validaCliente($request);

        try {
            DB::beginTransaction();
            $clienteUpdate = Cliente::query()->where('cliente_cpf', '=', "$cpfCliente")->update([
                'cliente_nome' => "$request->nome",
                'cliente_telefone_01' => "$request->telefone_01",
                'cliente_telefone_02' => "$request->telefone_02",
                'cliente_data_nascimento' => ConverteData::formataData($request->data_nascimento)
            ]);
            DB::commit();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json(boolval($clienteUpdate));
    }

    public function validaCliente(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'telefone_01' => 'required',
            'telefone_02' => 'nullable',
            'data_nascimento' => 'required|date|regex:/\d{2}\/\d{2}\/\d{4}/'
        ], Erros::mensagens());
    }
}
