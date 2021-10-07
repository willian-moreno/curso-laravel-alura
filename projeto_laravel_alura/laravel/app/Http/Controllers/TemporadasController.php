<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Temporadas;
use App\Services\TemporadaService;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    function index(Request $request, TemporadaService $temporadaService)
    {
        $retorno = $temporadaService->getListTemporadas($request->id);

        $series = $retorno['series'];
        $temporadas = $retorno['temporadas'];
        foreach ($series as $key => $serie);

        return view('series.temporadas.index', compact('serie', 'temporadas'));
    }
}
