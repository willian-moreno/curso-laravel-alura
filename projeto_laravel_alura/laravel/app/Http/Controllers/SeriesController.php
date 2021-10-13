<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodios;
use App\Models\Series;
use App\Models\Temporadas;
use App\Services\SerieService;
use Illuminate\Http\Request;
use Mockery\Undefined;

class SeriesController extends Controller
{
    function index(Request $request, SerieService $serieService)
    {
        try {
            $series = $serieService->getListSeries();
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

    function store(SeriesFormRequest $request, SerieService $serieService)
    {
        try {
            $serie = $serieService->save(
                $request->nome,
                $request->qtd_temporadas,
                $request->qtd_episodios
            );
            $request
                ->session()
                # O Flash permite que a sessao seja vista somente em uma requisicao;
                ->flash(
                'status_serie',
                    "A série <b>$serie->nome</b> foi a última adicionada!"
                );
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            if (!empty($request->nome)) {
                return view('series.create', compact('serie'));
            }
        }
    }

    function update(Request $request, SerieService $serieService)
    {
        try {
            $data = $serieService->update($request->id);
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        }
        return view('series.update', compact('data'));
    }

    function updated(Request $request, SerieService $serieService)
    {
        try {
            $nome = $serieService->updated($request->id, $request->nome);
            $request->session()->flash('status_serie', "A série <b>$nome</b> foi atualizada!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }

    function delete(Request $request, SerieService $serieService)
    {
        try {
            $serie = $serieService->delete($request->id);
            $request->session()->flash('status_serie', "A série <b>$serie->nome</b> foi deletada!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }
}
