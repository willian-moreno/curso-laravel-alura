<?php

namespace App\Services;

use App\Models\{Series, Temporadas};
use Illuminate\Support\Facades\DB;

class TemporadaService
{
    public function getListTemporadas(int $serieId)
    {
        DB::beginTransaction();
        $series = Series::query()->where('id', '=', $serieId)->get();
        $temporadas = Temporadas::query()->where('series_id', '=', $serieId)->get();
        DB::commit();
        $values = compact('series', 'temporadas');
        return $values;
    }
}
