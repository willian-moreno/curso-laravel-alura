@extends('series.layout')

@section('navbar')
@include('../navbar')
@endsection

@section('conteudo')
<section class="cardsection">
    <div class="card">
        <div class="card-body">
            <a href="{{ url ('/series/create')}}" class="btn btn-dark mb-4" name="" id="" role="button">
                Adicionar
            </a>
            @if (!empty($msg))
                <div class="alert alert-info" role="alert">
                    {!!$msg!!}
                </div>
            @endif
            <div class="table-responsive">
                <h4 class="card-title">Lista de séries</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1 h6">ID</th>
                            <th class="col-9 h6">NOME</th>
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
                                        <button name="update_serie" type="submit" class="btn btn-primary row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="/series/{{$serie->id}}"
                                        onsubmit="return confirm('Tem Certeza que deseja excluir a série {{addslashes($serie->nome)}}?')">
                                        @csrf
                                        @method('delete');
                                        <button name="delete_serie" type="submit" class="btn btn-danger row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                            Excluir
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
