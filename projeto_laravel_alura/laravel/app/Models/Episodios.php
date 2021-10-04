<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['numero'];

    public function temporada()
    {
        return $this->belongsTo(Temporadas::class);
    }
}
