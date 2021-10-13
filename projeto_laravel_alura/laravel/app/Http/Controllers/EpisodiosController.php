<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use App\Models\Series;
use App\Models\Temporadas;
use App\Services\EpisodioService;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    function index(Request $request, EpisodioService $episodioService)
    {
        $values = $episodioService->getListEpisodios($request->id_serie, $request->id_temporada);
        foreach ($values['series'] as $key => $serie);
        foreach ($values['temporadas'] as $key => $temporada);
        $episodios = $values['episodios'];
        $msg = $request->session()->get('status_episodio');
        return view('series.temporadas.episodios.index', compact('serie', 'temporada', 'episodios', 'msg'));
    }

    function updateStatus(Request $request, EpisodioService $episodioService)
    {
        try {
            $episodioService->setStatusEpisodios($request->id_temporada, $request->status_episodio);
            $request->session()->flash('status_episodio', "Status episódios assistidos salvo!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_episodio', "Erro: $th");
        } finally {
            return redirect()->back();
        }
    }
}
