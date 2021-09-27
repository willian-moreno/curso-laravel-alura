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
        try {
            $series = Series::query()
                ->orderBy('nome')
                ->get();

            $msg = $request->session()->get('status_serie');
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        }
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
                ->flash('status_serie', "A série <b>$serie->nome</b> foi a última adicionada!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return view('series.create', compact('serie'));
        }
    }

    function update(Request $request)
    {
        try {
            $id = $request->id;
            $serie = Series::query()->where('id', '=', $id)->get();
            foreach ($serie as $key => $data);
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        }
        return view('series.update', compact('data'));
    }

    function updated(Request $request)
    {
        try {
            $id = $request->id;
            $nome = $request->nome;
            Series::where('id', '=', $id)->update(array(
                'nome' => $nome
            ));
            $request->session()->flash('status_serie', "A série <b>$nome</b> foi atualizada!");
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }

    function delete(Request $request)
    {
        try {
            $id = $request->id;
            $serie = Series::query()->where('id', '=', $id)->get();
            foreach ($serie as $key => $value) {
                $request->session()->flash('status_serie', "A série <b>$value->nome</b> foi deletada!");
            }
            Series::destroy($request->id);
        } catch (\Throwable $th) {
            $request->session()->flash('status_serie', "Erro!: $th");
        } finally {
            return redirect('/series');
        }
    }
}
