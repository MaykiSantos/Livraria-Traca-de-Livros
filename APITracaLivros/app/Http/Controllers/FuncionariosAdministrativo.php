<?php


namespace App\Http\Controllers;


use App\Models\FuncionarioAdministrativo;

class FuncionariosAdministrativo extends Controller
{

    public function index()
    {
        return response()->json(FuncionarioAdministrativo::all());
    }
}
