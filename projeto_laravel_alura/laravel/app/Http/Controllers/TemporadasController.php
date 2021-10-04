<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    function index(Request $request)
    {
        $serieId = $request->id;

        $series = Series::query()->where('id', '=', $serieId)->get();
        $temporadas = Temporadas::query()->where('series_id', '=', $serieId)->get();

        foreach ($series as $key => $serie);

        return view('series.temporadas.index', compact('serie', 'temporadas'));
    }
}
