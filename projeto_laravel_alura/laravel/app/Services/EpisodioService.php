<?php

namespace App\Services;

use App\Models\{Series, Episodios, Temporadas};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EpisodioService
{
    public function getListEpisodios(int $serieId, int $temporadaId)
    {
        if (!Auth::check()) {
            return redirect('/login');
            exit();
        }
        DB::beginTransaction();
        $series = Series::where('id', '=', $serieId)->get();
        $temporadas = Temporadas::where('id', '=', $temporadaId)->get();
        $episodios = Episodios::query()->where('temporadas_id', '=', $temporadaId)->get();
        DB::commit();
        $values = compact('series', 'temporadas', 'episodios');
        return $values;
    }

    public function setStatusEpisodios(int $id_temporada, $status_episodios)
    {
        DB::beginTransaction();
        $temporada = Temporadas::find($id_temporada);
        $temporada->episodios->each(function (Episodios $episodio) use (
            $status_episodios
        ) {
            $episodio->status = in_array($episodio->id, $status_episodios);
        });
        $temporada->push();
        DB::commit();
    }
}
