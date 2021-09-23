@extends('series.layout')

@section('conteudo')
    <section class="cardsection">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Adicionar nova série</h2>
                <form method="post">
                    @csrf <!-- Obrigatorio. Serve para proteger contra requisicoes externas -->
                    <!-- Campo nome -->
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" id="nome" class="form-control"
                                placeholder="Nome da série">
                        </div>
                    </div>
                    <!-- Botoes -->
                    <div class="row col-sm-2 col-sm-2">
                        <input
                        name="salvar"
                        id="salvar"
                        class="btn btn-primary mr-2"
                        type="submit"
                        value="Salvar">
                        <a href="{{ url ('/series')}}" class="btn btn-dark" role="button">Voltar</a>
                    </div>
                </form>
                @if (strlen($nome ?? '') > 0 && !empty($nome ?? ''))
                    <div class="mt-4 alert alert-success" role="alert">
                        Série {{$nome ?? ''}} adicionada!
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection
