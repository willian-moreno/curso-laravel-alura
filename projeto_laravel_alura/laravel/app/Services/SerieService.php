<?php

namespace App\Services;

use App\Models\{Series, Episodios, Temporadas};

class SerieService
{

    public function getListSeries()
    {
        $series = Series::query()
            ->orderBy('nome')
            ->get();

        return $series;
    }

    public function save(string $nome, int $temporadas, int $episodios)
    {
        $qtdTemporadas = $temporadas;
        $qtdEpisodios = $episodios;
        $serie = Series::create(['nome' => $nome]);
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        return $serie;
    }

    public function update(int $idSerie)
    {
        $id = $idSerie;
        $serie = Series::query()->where('id', '=', $id)->get();
        foreach ($serie as $key => $data);
        return $data;
    }

    public function updated(int $idSerie, string $nomeSerie)
    {
        $id = $idSerie;
        $nome = $nomeSerie;
        Series::where('id', '=', $id)->update(array(
            'nome' => $nome
        ));

        return $nome;
    }

    public function delete(int $idSerie)
    {
        $id = $idSerie;
        $serie = Series::find($id);
        $serie->temporadas->each(function (Temporadas $temporadas) {
            $temporadas->episodios()->each(function (Episodios $episodios) {
                $episodios->delete();
            });
            $temporadas->delete();
        });
        $serie->delete();

        return $serie;
    }
}
