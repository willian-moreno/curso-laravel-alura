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

            @include('mensagem', ['msg' => $msg])

            <div class="table-responsive">
                <h4 class="card-title">Lista de séries</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1 h6 font-weight-bold text-uppercase">id</th>
                            <th class="col-7 h6 font-weight-bold text-uppercase">nome</th>
                            <th class="col-1 text-uppercase"></th>
                            <th class="col-1 text-uppercase"></th>
                            <th class="col-1 text-uppercase"></th>
                            <th class="col-1 text-uppercase"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $serie)
                        <tr>
                            <td class="align-middle">{{$serie->id}}</td>
                            <td class="align-middle">{{$serie->nome}} </td>
                            <td class="align-middle">
                                <span class="badge badge-secondary">
                                    {{$serie->temporadas->count()}}
                                </span>
                            </td>
                            <td class="align-middle">
                                <form method="post" action="/series/{{$serie->id}}/temporadas">
                                    @csrf
                                    @method('get')
                                    <button name="detalhes" type="submit" class="btn btn-link p-0">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="align-middle">
                                <form method="post" action="/series/update/{{$serie->id}}">
                                    @csrf
                                    <button name="update_serie" type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="align-middle">
                                <form method="post" action="/series/{{$serie->id}}"
                                    onsubmit="return confirm('Tem certeza que deseja excluir a série {{addslashes($serie->nome)}}?')">
                                    @csrf
                                    @method('delete')
                                    <button name="delete_serie" type="submit" class="btn btn-danger btn-sm">
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
