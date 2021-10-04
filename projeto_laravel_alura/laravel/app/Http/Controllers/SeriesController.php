<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodios;
use App\Models\Series;
use App\Models\Temporadas;
use Illuminate\Http\Request;
use Mockery\Undefined;

class SeriesController extends Controller
{
    function index(Request $request)
    {
        try {
            $series = Series::query()
                ->orderBy('nome')
                ->get();

            $msg = $request->session()->get('status_serie');
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        }
        return view('series.index', compact('series', 'msg'));
    }

    function create()
    {
        return view('series.create');
    }

    function store(SeriesFormRequest $request)
    {
        try {
            $nomeSerie = $request->nome;
            $qtdTemporadas = $request->qtd_temporadas;
            $qtdEpisodios = $request->qtd_episodios;
            $serie = Series::create(['nome' => $nomeSerie]);
            for ($i = 1; $i <= $qtdTemporadas; $i++) {
                $temporada = $serie->temporadas()->create(['numero' => $i]);
                for ($j = 1; $j <= $qtdEpisodios; $j++) {
                    $temporada->episodios()->create(['numero' => $j]);
                }
            }
            $request
                ->session()
                # O Flash permite que a sessao seja vista somente em uma requisicao;
                ->flash(
                    'status_serie',
                    "A série <b>$nomeSerie</b> foi a última adicionada! <br>
                     Quantidade de Temporadas: <b>$qtdTemporadas</b> <br>
                     Quantidade de Episódios: <b>$qtdEpisodios</b>"
                );
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            if (!empty($request->nome)) {
                return view('series.create', compact('serie'));
            }
        }
    }

    function update(Request $request)
    {
        try {
            $id = $request->id;
            $serie = Series::query()->where('id', '=', $id)->get();
            foreach ($serie as $key => $data);
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        }
        return view('series.update', compact('data'));
    }

    function updated(Request $request)
    {
        try {
            $id = $request->id;
            $nome = $request->nome;
            Series::where('id', '=', $id)->update(array(
                'nome' => $nome
            ));
            $request->session()->flash('status_serie', "A série <b>$nome</b> foi atualizada!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }

    function delete(Request $request)
    {
        try {
            $id = $request->id;
            $serie = Series::query()->where('id', '=', $id)->get();
            $temporadas = Temporadas::query()->where('series_id', '=', $id)->get();
            foreach ($temporadas as $key => $temporada) {
                Episodios::where('temporadas_id', '=', $temporada->id)->delete();
            }
            Temporadas::where('series_id', '=', $id)->delete();
            Series::destroy($request->id);
            foreach ($serie as $key => $value) {
                $request->session()->flash('status_serie', "A série <b>$value->nome</b> foi deletada!");
            }
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }

}
