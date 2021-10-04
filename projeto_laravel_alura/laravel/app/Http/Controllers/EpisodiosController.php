<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use App\Models\Series;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    function index(Request $request)
    {
        $serieId = $request->id_serie;
        $temporadaId = $request->id_temporada;

        $series = Series::where('id', '=', $serieId)->get();
        $temporadas = Temporadas::where('id', '=', $temporadaId)->get();

        foreach ($series as $key => $serie);
        foreach ($temporadas as $key => $temporada);

        $episodios = Episodios::query()->where('temporadas_id', '=', $temporadaId)->get();
        return view('series.temporadas.episodios.index', compact('serie', 'temporada', 'episodios'));
    }
}
