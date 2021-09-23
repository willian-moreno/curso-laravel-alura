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
                <a class="nav-link active" href="{{ url('/series') }}">Series</a>
            </li>
        </ul>
    </div>
</nav>
@endsection

@section('conteudo')
<div class="addSerie">
    <a name="" id="" class="btn btn-dark" href="{{ url ('/series/create')}}" role="button">Adicionar Série</a>
</div>

<section class="cardsection">
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h2 class="card-title">Séries</h2>
            <ul class="list-group">
                @foreach ($series as $serie)
                <li class="list-group-item">
                    <h6>{{$serie}}</h6>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
</section>
@endsection
