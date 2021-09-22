<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    function index()
    {
        $series = array(
            'Supernatural',
            'Frontier',
            'Demolidor',
            'The punisher'
        );

        return view('./series/index', compact('series'));
    }
}
