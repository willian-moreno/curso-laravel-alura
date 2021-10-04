@extends('series.layout')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Séries</li>
<li class="breadcrumb-item" aria-current="page">Update</li>
@endsection

@section('conteudo')
<section class="cardsection">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Atualizar série: {{$data->nome}}</h2>
            <form method="post">
                @csrf
                <!-- Obrigatorio. Serve para proteger contra requisicoes externas -->
                <!-- Campo nome -->
                <div class="form-group">
                    <label for="nome" class="h5">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da série"
                        value="{{$data->nome}}" required>
                </div>
                <!-- Botoes -->
                <div class="row col-sm-2 col-sm-2">
                    <form method="post" action="/series/update/{{$data->id}}">
                        @csrf
                        @method('put')
                        <button name="atualizar" id="atualizar" class="btn btn-primary mr-2"
                            type="submit">Atualizar</button>
                    </form>
                    <a href="{{ url ('/series')}}" class="btn btn-dark" role="button">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection
