@extends('series.layout')

@section('conteudo')
    <section class="cardsection">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h2 class="card-title">Adicionar nova série</h2>
                <form method="post">
                    <!-- Campo nome -->
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" id="nome" class="form-control"
                                placeholder="Nome da série">
                        </div>
                    </div>
                    <input name="salvar" id="salvar" class="btn btn-primary" type="button" value="salvar">
                </form>
            </div>
        </div>
        </div>
    </section>

    <div class="addSerie">
        <a name="" id="" class="btn btn-dark" href="{{ url ('/series')}}" role="button">Voltar</a>
    </div>
@endsection
