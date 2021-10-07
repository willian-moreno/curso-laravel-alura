<?php

namespace App\Services;

use App\Models\{Series, Temporadas};

class TemporadaService
{
    public function getListTemporadas(int $serieId)
    {
        $series = Series::query()->where('id', '=', $serieId)->get();
        $temporadas = Temporadas::query()->where('series_id', '=', $serieId)->get();
        $values = compact('series', 'temporadas');
        return $values;
    }
}
