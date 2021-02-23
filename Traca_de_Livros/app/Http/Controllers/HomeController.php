<?php

namespace App\Http\Controllers;

use App\Models\LivroCategoria;
use App\Models\PapelariaCategoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $categoriasLivros = LivroCategoria::all();
        $categoriasPapelaria = PapelariaCategoria::all();
        $produtos = Produto::all();
        return view('home',[
            'categoriasLivros' => $categoriasLivros,
            'categoriasPapelaria' => $categoriasPapelaria,
            'produtos' => $produtos
        ]);
    }
}
