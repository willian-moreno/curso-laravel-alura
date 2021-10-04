<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    use HasFactory;

    public function temporada()
    {
        $this->belongsTo(Temporadas::class);
    }
}
