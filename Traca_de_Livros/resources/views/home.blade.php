@extends('principal.corpo-principal')

@section('menu-livros')

    @foreach($categoriasLivros as $categoria)
        <li><a class="dropdown-item" href="#">{{$categoria->descricao}}</a></li>
    @endforeach

@endsection

@section('menu-papelaria')
    @foreach($categoriasPapelaria as $categoria)
        <li><a class="dropdown-item" href="#">{{$categoria->descricao}}</a></li>
    @endforeach
@endsection

@section('bloco-superior')

    <div id="apresentacao">
        <!--Destaques/Banner-->
        <div class="container-fluid">
            <div class="row">
                <div id="frase-de-impacto">
                    <h1>Mergulhe nos livros!</h1>
                    <h3>E sacie sua cede por conhecimento e hitórias</h3>
                </div>
                <div>
                    <ul>
                        <a href="./detalhes.html">
                            <li class="livro-destaque"><img
                                    src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[0]->imagem)?>" alt=""></li>
                        </a>
                        <a href="#">
                            <li class="livro-destaque"><img src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[1]->imagem)?>" alt="livro modelo">
                            </li>
                        </a>
                        <a href="#">
                            <li class="livro-destaque"><img src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[2]->imagem)?>" alt="livro modelo">
                            </li>
                        </a>
                    </ul>
                    <ul>
                        <a href="#">
                            <li class="livro-destaque"><img src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[3]->imagem)?>" alt="livro modelo">
                            </li>
                        </a>
                        <a href="#">
                            <li class="livro-destaque"><img src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[4]->imagem)?>" alt="livro modelo">
                            </li>
                        </a>
                        <a href="#">
                            <li class="livro-destaque"><img src="data:imaeg/jpeg;base64,<?= base64_encode($produtos[5]->imagem)?>" alt="livro modelo">
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('bloco-principal')
    <div class="row">
        <h2>Mais Populares</h2>
    </div>
    <div class="row">
        <ul>

            @foreach($produtos as $livro)
                <li class="col-lg-2 col-sm-6 col-md-4 livros-populares">
                    <img src="data:image/jpeg;base64, <?= base64_encode($livro->imagem) ?>" alt="{{$livro->titulo}}">
                    <?php
                        $cal = $livro->valor / 12;
                    ?>
                    <h3 class="titulo-livro fs-5">{{substr($livro->titulo, 0, 36)}}</h3>
                    <div>
                        <p class="inf-livro">{{$livro->autor}}</p>
                        <p class="inf-livro">Editora: {{$livro->editora}}</p>
                        <p class="valor-livro">R$ {{number_format($livro->valor, 2, ',', '')}}</p>
                        <p class="valor-parc-livro">12X R${{number_format($cal, 2, ',', '')}} sem juros</p>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
@endsection
