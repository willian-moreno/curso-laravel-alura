<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporadas extends Model
{
    use HasFactory;

    /**
     * Por padrao o sqlite cria mais duas colunas de data de criacao
     * e data de atualizacao e, se nao forem mapeadas, retornam erro.
     * Para tal, é possivel setar o timestamp como false.
     */
    public $timestamps = false;
    /**
     * Esse metodo serve para informar quais dados eu vou receber dentro
     * da array na funcao que insere os dados no banco.
     */
    protected $fillable = ['nome'];

    public function episodios()
    {
        $this->hasMany(Episodios::class);
    }

    public function serie()
    {
        $this->belongsTo(Series::class);
    }
}
