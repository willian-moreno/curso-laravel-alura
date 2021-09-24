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
            $serie = Series::create($request->all());
        } catch (\Throwable $th) {
            echo $th;
        } finally {
            return view('series.create', compact('serie'));
        }
    }
}
