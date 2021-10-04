@extends('series.layout')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Séries</li>
<li class="breadcrumb-item active" aria-current="page">Temporadas</li>
<li class="breadcrumb-item active" aria-current="page">Episódios</li>
@endsection

@section('conteudo')

<div class="card ">
    <div class="card-body">
        <a href="{{url()->previous()}}" class="btn btn-dark mb-4"  name="" id="" role="button">
            Voltar
        </a>
        @if (!empty($msg))
        <div class="alert alert-info align-middle" role="alert">
            <i class="bi bi-info-circle-fill">&nbsp;{!!$msg!!}</i>
        </div>
        @endif
        <div class="table-responsive">
            <h2 class="card-title">Série {{$serie->nome}}</h2>
            <h4 class="card-title">Lista de episódios - Temporada {{$temporada->numero}}</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-1 h6 font-weight-bold">ID</th>
                        <th class="col-10 h6 font-weight-bold">EPISÓDIO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($episodios as $ep)
                    <tr>
                        <td class="align-middle">{{$ep->id}}</td>
                        <td class="align-middle"> Episódio {{$ep->numero}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
