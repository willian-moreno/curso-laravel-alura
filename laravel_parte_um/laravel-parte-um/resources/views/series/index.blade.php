@extends('series.layout')

@section('navbar')
<nav class="navbar navbar-expand-xl navbar-dark" style="background-color: #246B85">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
        aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/series') }}">Series</a>
            </li>
        </ul>
    </div>
</nav>
@endsection

@section('conteudo')
<section class="cardsection">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Séries</h2>
            <a href="{{ url ('/series/create')}}" class="btn btn-dark mb-4" name="" id="" role="button">Adicionar
                Série</a>
            <ul class="list-group">
                @foreach ($series as $serie)
                <li class="list-group-item">
                    <h6>{{$serie->nome}}</h6>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection
