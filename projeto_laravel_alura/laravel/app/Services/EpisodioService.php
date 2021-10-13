<?php

namespace App\Services;

use App\Models\{Series, Episodios, Temporadas};
use Illuminate\Support\Facades\DB;

class EpisodioService
{
    public function getListEpisodios(int $serieId, int $temporadaId)
    {
        DB::beginTransaction();
        $series = Series::where('id', '=', $serieId)->get();
        $temporadas = Temporadas::where('id', '=', $temporadaId)->get();
        $episodios = Episodios::query()->where('temporadas_id', '=', $temporadaId)->get();
        DB::commit();
        $values = compact('series', 'temporadas', 'episodios');
        return $values;
    }
}
