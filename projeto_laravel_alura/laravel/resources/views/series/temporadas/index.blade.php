@extends('series.layout')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Séries</li>
<li class="breadcrumb-item active" aria-current="page">Temporadas</li>
@endsection

@section('conteudo')

<div class="card ">
    <div class="card-body">
        <a href="{{url('/series')}}" class="btn btn-dark mb-4"  name="" id="" role="button">
            Voltar
        </a>

        <div class="table-responsive">
            <h2 class="card-title">Série {{$serie->nome}}</h2>
            <h4 class="card-title">Lista de temporadas</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-1 h6 font-weight-bold text-uppercase">id</th>
                        <th class="col-9 h6 font-weight-bold text-uppercase">temporada</th>
                        <th class="col-1 text-uppercase"></th>
                        <th class="col-1 text-uppercase"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temporadas as $tp)
                    <tr>
                        <td class="align-middle">{{$tp->id}}</td>
                        <td class="align-middle"> Temporada {{$tp->numero}}</td>
                        <td class="align-middle">
                            <span class="badge badge-secondary">
                                {{$tp->episodios->where('status','=',true)->count()}} / {{$tp->episodios->count()}}
                            </span>
                        </td>
                        <td class="align-middle">
                            <form method="post" action="/series/{{$serie->id}}/temporadas/{{$tp->id}}/episodios">
                                @csrf
                                @method('get')
                                <button name="detalhes" type="submit" class="btn btn-link shadow-none p-0">
                                    <i class="bi bi-three-dots"></i>
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
@endsection
