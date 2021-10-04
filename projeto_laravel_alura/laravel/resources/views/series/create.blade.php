@extends('series.layout')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Séries</li>
<li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('conteudo')
<section class="cardsection">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Adicionar nova série</h2>
            <form method="post">
                @csrf <!-- Obrigatorio. Serve para proteger contra requisicoes externas -->

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="nome" class="h5">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da série">
                    </div> <!-- Campo nome -->

                    <div class="form-group col-md-2">
                        <label for="qtd_temporadas" class="h5">Nº Temporadas</label>
                        <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control" min="1" max="50">
                    </div> <!-- Campo temporadas -->

                    <div class="form-group col-md-2">
                        <label for="qtd_episodios" class="h5">Nº Episódios</label>
                        <input type="number" name="qtd_episodios" id="qtd_episodios" class="form-control" min="1" max="100">
                    </div> <!-- Campo episodios -->
                </div>

                <div class="form-row">
                    <input name="salvar" id="salvar" class="col-md-1 btn btn-primary m-2" type="submit" value="Salvar">
                    <a href="{{ url ('/series')}}" class="col-md-1 btn btn-dark m-2" role="button">Voltar</a>
                </div> <!-- Botoes -->

            </form>
            @if (!empty($serie))
            <div class="mt-4 alert alert-success" role="alert">
                <i class="bi bi-check-lg">&nbsp;Série <b>{{$serie->nome ?? ''}}</b> adicionada!</i>
            </div>
            @endif
            @if ($errors->any())
            <div class=" mt-4 pl-5 pr-5 alert alert-danger">
                <ol class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{!!$error!!}</li>
                    @endforeach
                </ol>
            </div>
            @endif
        </div>
    </div>
    </div>
</section>
@endsection
