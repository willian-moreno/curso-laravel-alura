<?php

namespace App\Services;

use App\Models\{Series, Episodios, Temporadas};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SerieService
{

    public function getListSeries()
    {
        DB::beginTransaction();
        $series = Series::query()->orderBy('nome')->get();
        DB::commit();
        return $series;
    }

    public function save(string $nome, int $temporadas, int $episodios)
    {
        DB::beginTransaction();
        $qtdTemporadas = $temporadas;
        $qtdEpisodios = $episodios;
        $serie = Series::create(['nome' => $nome]);
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        DB::commit();

        return $serie;
    }

    public function update(int $idSerie)
    {
        DB::beginTransaction();
        $serie = Series::query()->where('id', '=', $idSerie)->get();
        foreach ($serie as $key => $data);
        DB::commit();
        return $data;
    }

    public function updated(int $idSerie, string $nomeSerie)
    {
        DB::beginTransaction();
        Series::where('id', '=', $idSerie)->update(array(
            'nome' => $nomeSerie
        ));
        DB::commit();
        return $nomeSerie;
    }

    public function delete(int $idSerie)
    {
        DB::beginTransaction();
        $serie = Series::find($idSerie);
        $serie->temporadas->each(function (Temporadas $temporadas) {
            $temporadas->episodios()->each(function (Episodios $episodios) {
                $episodios->delete();
            });
            $temporadas->delete();
        });
        $serie->delete();
        DB::commit();
        return $serie;
    }
}
