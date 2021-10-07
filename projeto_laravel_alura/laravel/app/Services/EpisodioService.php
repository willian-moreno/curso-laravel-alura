<?php

namespace App\Services;

use App\Models\{Series, Episodios, Temporadas};

class EpisodioService
{
    public function getListEpisodios(int $serieId, int $temporadaId)
    {
        $series = Series::where('id', '=', $serieId)->get();
        $temporadas = Temporadas::where('id', '=', $temporadaId)->get();
        $episodios = Episodios::query()->where('temporadas_id', '=', $temporadaId)->get();
        $values = compact('series', 'temporadas', 'episodios');
        return $values;
    }
}
