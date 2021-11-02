@extends('series.layout')

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('listar_series') }}">
            Séries
        </a>
    </li>
    <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('listar_temporadas', ['id' => $serie->id]) }}">
            Temporadas
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Episódios</li>
@endsection

@section('conteudo')

    <div class="card ">
        <div class="card-body">
            <a href="{{ route('listar_temporadas', ['id' => $serie->id]) }}" class="btn btn-dark mb-4" name="" id=""
                role="button">
                Voltar
            </a>

            @include('mensagem', ['msg' => $msg])

            <div class="table-responsive">
                <h2 class="card-title">Série {{ $serie->nome }}</h2>
                <h4 class="card-title">Lista de episódios - Temporada {{ $temporada->numero }}</h4>
                <form method="post"
                    action="{{ route('episodios_status', ['id_serie' => $serie->id, 'id_temporada' => $temporada->id]) }}">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-1 h6 font-weight-bold text-uppercase">id</th>
                                <th class="col-9 h6 font-weight-bold text-uppercase">episódio</th>
                                <th class="col-1 text-uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($episodios as $ep)
                                <tr>
                                    <td class="align-middle">{{ $ep->id }}</td>
                                    <td class="align-middle"> Episódio {{ $ep->numero }}</td>
                                    <td class="align-middle">
                                        <div class="form-check">
                                            <input type="checkbox" name="status_episodio[]" value="{{ $ep->id }}"
                                                {{ $ep->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button name="atualizar" id="atualizar" class="btn btn-primary m-2" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
