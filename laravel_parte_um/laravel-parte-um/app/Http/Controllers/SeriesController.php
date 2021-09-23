<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;
use Mockery\Undefined;

class SeriesController extends Controller
{
    function index()
    {
        $series = Series::query()
            ->orderBy('nome')
            ->get();
        return view('series.index', compact('series'));
    }

    function create()
    {
        return view('series.create');
    }

    function store(Request $request)
    {
        try {
            $nome = $request->nome;
            Series::create([
                'nome' => $nome
            ]);
            # echo "<script>alert('Série $nome adicionada!')</script>";
        } catch (\Throwable $th) {
            echo $th;
        } finally {
            return view('series.create', compact('nome'));
        }
    }
}
