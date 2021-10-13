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
                <div class="form-row">
                    <form method="post" action="/series/update/{{$data->id}}">
                        @csrf
                        @method('put')
                        <button name="atualizar" id="atualizar" class="col-md-1 btn btn-primary m-2" type="submit">Atualizar</button>
                        <a href="{{ url ('/series')}}" class="col-md-1 btn btn-dark m-2" role="button">Voltar</a>
                    </form>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection
