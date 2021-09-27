<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;
use Mockery\Undefined;

class SeriesController extends Controller
{
    function index(Request $request)
    {
        $series = Series::query()
            ->orderBy('nome')
            ->get();

        $msg = $request->session()->get('serie');
        return view('series.index', compact('series', 'msg'));
    }

    function create()
    {
        return view('series.create');
    }

    function store(Request $request)
    {
        try {
            $serie = Series::create($request->all());
            $request
                ->session()
                # O Flash permite que a sessao seja vista somente em uma requisicao;
                ->flash('serie', $serie->nome);
        } catch (\Throwable $th) {
            echo $th;
        } finally {
            return view('series.create', compact('serie'));
        }
    }
}
