<?php


namespace App\Http\Controllers;


use App\Http\Help\Erros;
use App\Models\Chamado;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ChamadosController extends Controller
{

    public function index()
    {
        $chamados = Chamado::all();

        return response()->json($chamados);
    }

    public function show(int $idChamado)
    {
        $chamado = Chamado::query()->where('id', '=', "$idChamado")->get();
        if (sizeof($chamado) == false){
            return Erros::naoEncontado();
        }

        return response()->json($chamado);
    }

    public function showChamadoCliente(string $cpfCliente)
    {
        $chamadosCliente = Chamado::query()
            ->join('clientes', 'clientes.id', '=', 'fk_clientes_id')
            ->where('cliente_cpf' , '=', "$cpfCliente")
            ->select(['chamados.*', 'cliente_cpf'])
            ->get();
        if (sizeof($chamadosCliente) == false){
            return Erros::naoEncontado();
        }

        return response()->json($chamadosCliente);
    }

    public function destroy(int $idChamado)
    {
        try {
            DB::beginTransaction();
            $chamadoDelete = Chamado::query()->where('id', '=', "$idChamado")->first();
            if ($chamadoDelete == false){
                return Erros::naoEncontado();
            }
            $chamadoDelete->delete();
            DB::commit();
        }catch (\Exception $e){
            return Erros::erroBanco($e);
        }

        return response()->json(boolval($chamadoDelete));
    }


}
