<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\FuncionarioAdministrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionariosAdministrativoController extends Controller
{

    public function index()
    {
        $funcionarios = FuncionarioAdministrativo::all();
        return response()->json($funcionarios);
    }

    public function show(string $cpf)
    {
        $funcionario = FuncionarioAdministrativo::query()->where('administrativo_cpf', '=', "$cpf")->get();

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
            'cpf' => 'unique:App\Models\FuncionarioAdministrativo,administrativo_cpf'
        ], Erros::mensagens());
        $this->validaFuncionarioAdm($request);

        DB::beginTransaction();
        $funcionario = FuncionarioAdministrativo::create([
            'administrativo_cpf' => "$request->cpf",
            'administrativo_nome' => "$request->nome",
            'administrativo_senha' => "$request->senha"
        ]);
        DB::commit();

        return response()->json($funcionario, 200);
    }

    public function update(string $cpf, Request $request)
    {

        $this->validaFuncionarioAdm($request);

        $funcionarioUpdate = FuncionarioAdministrativo::query()->where('administrativo_cpf', '=', "$cpf")->update([
            'administrativo_cpf' => "$request->cpf" ,
            'administrativo_nome' => "$request->nome"
        ]);

        if ($funcionarioUpdate == false)
        {
            return Erros::naoEncontado();
        }

        return response()->json(boolval($funcionarioUpdate));
    }

    public function destroy(string $cpf)
    {
        $funcionarioApagar = FuncionarioAdministrativo::query()->where('administrativo_cpf', '=', "$cpf")->first();

        if($funcionarioApagar == false)
        {
            return Erros::naoEncontado();
        }
        $funcionarioApagar->delete();

        return response()->json(boolval($funcionarioApagar), 200);

    }

    private function validaFuncionarioAdm(Request $request){
        $this->validate($request, [
            'cpf' =>'required|size:11|regex:/\d{11}/',
            'nome' => 'required',
        ], Erros::mensagens());
    }



}
