<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\FuncionarioAlmoxarifado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioAlmoxarifadoController extends Controller
{
    public function index()
    {
        $funcionarios = FuncionarioAlmoxarifado::all();
        return response()->json($funcionarios);
    }

    public function show(string $cpf)
    {
        $funcionario = FuncionarioAlmoxarifado::query()->where('funcionario_cpf', '=', "$cpf")->get();

        if (sizeof($funcionario) == false)
        {
            return Erros::naoEncontado();
        }

        return response()->json($funcionario, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'senha' => 'required|min:10',
            'cpf' => 'unique:App\Models\FuncionarioAlmoxarifado,funcionario_cpf'
        ], Erros::mensagens());
        $this->validaFuncionario($request);

        DB::beginTransaction();
        $funcionario = FuncionarioAlmoxarifado::create([
            'funcionario_cpf' => "$request->cpf",
            'funcionario_nome' => "$request->nome",
            'funcionario_senha' => "$request->senha"
        ]);
        DB::commit();

        return response()->json($funcionario, 200);
    }

    public function update(string $cpf, Request $request)
    {

        $this->validaFuncionario($request);

        $funcionarioUpdate = FuncionarioAlmoxarifado::query()->where('funcionario_cpf', '=', "$cpf")->update([
            'funcionario_cpf' => "$request->cpf" ,
            'funcionario_nome' => "$request->nome"
        ]);

        if ($funcionarioUpdate == false)
        {
            return Erros::naoEncontado();
        }

        return response()->json(boolval($funcionarioUpdate));
    }

    public function destroy(string $cpf)
    {
        $funcionarioApagar = FuncionarioAlmoxarifado::query()->where('funcionario_cpf', '=', "$cpf")->first();

        if($funcionarioApagar == false)
        {
            return Erros::naoEncontado();
        }
        $funcionarioApagar->delete();

        return response()->json(boolval($funcionarioApagar));

    }

    private function validaFuncionario(Request $request){
        $this->validate($request, [
            'cpf' =>'required|size:11|regex:/\d{11}/',
            'nome' => 'required',
        ], Erros::mensagens());
    }

}
