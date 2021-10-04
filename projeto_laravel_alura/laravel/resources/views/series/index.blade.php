@extends('series.layout')

@section('navbar')
@include('../navbar')
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Séries</li>
@endsection

@section('conteudo')
<section class="cardsection">
    <div class="card ">
        <div class="card-body">
            <a href="{{ url ('/series/create')}}" class="btn btn-dark mb-4" name="" id="" role="button">
                <i class="bi bi-plus-lg"></i>&nbsp;Adicionar
            </a>
            @if (!empty($msg))
            <div class="alert alert-info align-middle" role="alert">
                <i class="bi bi-info-circle-fill">&nbsp;{!!$msg!!}</i>
            </div>
            @endif
            <div class="table-responsive">
                <h4 class="card-title">Lista de séries</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1 h6 font-weight-bold">ID</th>
                            <th class="col-9 h6 font-weight-bold">NOME</th>
                            <th class="col-1"></th>
                            <th class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $serie)
                        <tr>
                            <td class="align-middle">{{$serie->id}}</td>
                            <td class="align-middle">{{$serie->nome}}</td>
                            <td>
                                <form method="post" action="/series/update/{{$serie->id}}">
                                    @csrf
                                    <button name="update_serie" type="submit" class="btn btn-primary btn-sm row">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="/series/{{$serie->id}}"
                                    onsubmit="return confirm('Tem certeza que deseja excluir a série {{addslashes($serie->nome)}}?')">
                                    @csrf
                                    @method('delete');
                                    <button name="delete_serie" type="submit" class="btn btn-danger btn-sm row">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
