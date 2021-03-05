<?php


namespace App\Http\Controllers;


use App\Models\Endereco;

class enderecosController extends Controller
{

    public function index()
    {
        $enderecos = Endereco::all();

        return response()->json($enderecos);
    }
}
